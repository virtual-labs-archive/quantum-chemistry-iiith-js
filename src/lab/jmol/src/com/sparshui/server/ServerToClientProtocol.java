package com.sparshui.server;

import java.io.ByteArrayOutputStream;
import java.io.DataOutputStream;
import java.io.IOException;
import java.net.Socket;
import java.util.List;
import java.util.ArrayList;

import com.sparshui.common.ClientProtocol;
import com.sparshui.common.Event;
import com.sparshui.common.utils.Converter;

/**
 * Represents the server to client connection.
 * 
 * @author Tony Ross
 */
public class ServerToClientProtocol extends ClientProtocol {

  private DataOutputStream _bufferOut;
  private ByteArrayOutputStream _buffer;

  /**
   * Constructs a new connection to the client.
   * 
   * @param socket
   *          The socket that has been opened to the client.
   * @throws IOException
   */
  public ServerToClientProtocol(Socket socket) throws IOException {
    super(socket);
    _buffer = new ByteArrayOutputStream();
    _bufferOut = new DataOutputStream(_buffer);
  }

  /**
   * Retrieve a list of allowed gestures for the provided group id. The message
   * sent is of the following format:
   * 
   * 1 byte - Event Type 
   * 4 bytes - Message Length 
   * 4 bytes - GroupID
   * 
   * @param groupID
   *          The ID of the group to obtain allowed gestures for
   * @return A list containing string identifiers for all allowed gestures
   * @throws IOException
   *           If an error occurs while communication with the client.
   */
  public List getGestures(int groupID) throws IOException {
    List gestures = new ArrayList();
    _bufferOut.writeInt(groupID);
    sendBuffer(MessageType.GET_ALLOWED_GESTURES);

    for (int length = _in.readInt(); length > 0; length -= 4) {
      int gestureID = _in.readInt();
      if (gestureID < 0) {
        // this is a string descriptor for a class
        byte[] bytes = new byte[-gestureID];
        _in.read(bytes);
        gestures.add(Converter.byteArrayToString(bytes));
        length -= bytes.length;
      } else {
        gestures.add(new Integer(gestureID));
      }
    }
    return gestures;
  }

  /**
   * Retrieve a list of allowed gestures for the provided group id. The message
   * sent is of the following format:
   * 
   * 1 byte - Event Type 
   * 4 bytes - Message Length 
   * 4 bytes - x coordinate 
   * 4 bytes - y coordinate
   * 
   * @param touchPoint
   *          The data point for the group to retrieve from
   * @return The Group ID
   * @throws IOException
   *           If an error occurs during communication with the client.
   */
  public int getGroupID(TouchPoint touchPoint) throws IOException {
    byte[] tempFloat = new byte[4];
    // Send the x and y coordinates
    Converter.floatToByteArray(tempFloat, 0, touchPoint.getLocation().getX());
    _bufferOut.write(tempFloat);
    Converter.floatToByteArray(tempFloat, 0, touchPoint.getLocation().getY());
    _bufferOut.write(tempFloat);
    sendBuffer(MessageType.GET_GROUP_ID);

    // Get the Group ID
    int ret = _in.readInt();
    return ret;
  }

  /**
   * Instruct the client to process the events that have been generated by a
   * group.
   * 
   * @param groupID
   *          The group ID these events have been generated on.
   * @param events
   * @throws IOException
   *           If there is a communication error.
   */
  public void processEvents(int groupID, List events) throws IOException {
    for (int i = 0; i < events.size(); i++) {
      _bufferOut.writeInt(groupID);
      _bufferOut.write(((Event) events.get(i)).serialize());
      sendBuffer(MessageType.EVENT);
    }
  }

  /**
   * Send an error message to the client.
   * 
   * @param errCode
   *          EventType.DRIVER_NONE
   * @param events
   * @throws IOException
   *           If there is a communication error.
   */
  public void processError(int errCode) throws IOException {
    _bufferOut.writeInt(-1);
    _bufferOut.writeInt(errCode);
    sendBuffer(MessageType.EVENT);
  }
 
  /**
   * 
   * @param type 
   * @throws IOException
   */

  private void sendBuffer(int type) throws IOException {
    _out.writeByte((byte) type);
    _out.writeInt(_buffer.size()); // Message length (excluding type)
    _out.write(_buffer.toByteArray()); // Message contents
    _buffer.reset();
  }

}
