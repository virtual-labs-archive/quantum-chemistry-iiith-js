<?php
	
	if($file_index==0)
	{
			
	?>
	<tr>
	<td>	Select &nbsp; &nbsp; 
			<select name="mol">
			  <option value="O"> O </option>
			  <option value="N"> N </option>
			  <option value="C"> C </option>
			  <option value="H"> H </option>
			</select>
		       
	</td>

	<td colspan=7>
		<input type="submit" name="render" value="Render" />
		</form>
	</td> 
	</tr>
	<?php 
		} 
		else if($file_index==1)
		{
	?>
		<tr>
			<td> N </td> 
			<td colspan=7> </td>
		</tr>
		<tr>
			<td>
			 	 
                        	<select name="mol">
                          	  <option value="O"> O </option>
                          	  <option value="N"> N </option>
                         	  <option value="C"> C </option>
                          	  <option value="H"> H </option>
               			</select>
        		</td>
			<td>
				<select name="number"> 
				  <option value="1"> 1 </option>
				</select>
			</td>
			<td>
				<input type="text" id="bond_length" DISABLED />
			</td>
			<td colspan="5">
				<input type="submit" name="render" value="Render" />
				</form>
			</td>
			
		 </tr>
	<?php
		}
		else if($file_index==2)
		{
	?>
		<tr>
			<td> N </td> 
			<td colspan=7> </td>
		</tr>
		 <tr>
                        <td> H </td>
			<td> 1 </td>
                        <td >  1.00000000 </td>
                        <td colspan="5"> </td>

                 </tr>
		 <tr>
                        <td>

                                <select name="mol">
                                  <option value="O"> O </option>
                                  <option value="N"> N </option>
                                  <option value="C"> C </option>
                                  <option value="H"> H </option>
                                </select>
                        </td>
                        <td>
                                <select name="number_1">
                                  <option value="1"> 1 </option>
                                  <option value="2"> 2 </option>
                                </select>
                        </td>
                        <td>
                                <input type="text" id="bond_length" DISABLED />
                        </td>
                        <td>
                                <select name="number_2">
                                  <option value="1"> 1 </option>
                                  <option value="2"> 2 </option>
                                </select>
                        </td>
                        <td>
                                <input type="text" id="bond_length" DISABLED />
                        </td>
			<td colspan="3">
                                <input type="submit" name="render" value="Render" />
                                </form>
                        </td>

                 </tr>
	<?php
		}
		else if($file_index == 3)
		{

	?>
		<tr>
                        <td> N </td>
                        <td colspan=7> </td>
                </tr>
                <tr>
                        <td> H </td>
			<td> 1 </td>
                        <td >  1.00000000 </td>
                        <td colspan="5"> </td>

                </tr>

		<tr>
                        <td> H </td>
                        <td> 1 </td>
                        <td> 1.00000000 </td>
                        <td> 2 </td>
                        <td> 109.47120255 </td>
			<td colspan="3"> </td>
		</tr>
		  <tr>
                        <td>

                                <select name="mol">
                                  <option value="O"> O </option>
                                  <option value="N"> N </option>
                                  <option value="C"> C </option>
                                  <option value="H"> H </option>
                                </select>
                        </td>
                        <td>
                                <select name="number_1">
                                  <option value="1"> 1 </option>
                                  <option value="2"> 2 </option>
                                  <option value="3"> 3 </option>
                                </select>
                        </td>
                        <td>
                                <input type="text" id="bond_length" DISABLED />
                        </td>
                        <td>
                                <select name="number_2">
                                  <option value="1"> 1 </option>
                                  <option value="2"> 2 </option>
                                  <option value="3"> 3 </option>
                                </select>
                        </td>
                        <td>
                                <input type="text" id="bond_length" DISABLED />
                        </td>
                        <td>
                                <select name="number_3">
                                  <option value="1"> 1 </option>
                                  <option value="2"> 2 </option>
                                  <option value="3"> 3 </option>
                                </select>
                        </td>
                        <td>
                                <input type="text" id="bond_length" DISABLED />
                        </td>
			
                        <td colspan="2">
                                <input type="submit" name="render" value="Render" />
                                </form>
                        </td>

                 </tr>
	<?php 
		}
		else
		{
	?>
		                <tr>
                        <td> N </td>
                        <td colspan=7> </td>
                </tr>
                <tr>
                        <td> H </td>
                        <td> 1 </td>
                        <td >  1.00000000 </td>
                        <td colspan="5"> </td>

                </tr>

                <tr>
                        <td> H </td>
                        <td> 1 </td>
                        <td> 1.00000000 </td>
                        <td> 2 </td>
                        <td> 109.47120255 </td>
                        <td colspan="3"> </td>
                </tr>
                <tr>
                        <td> H </td>
                        <td> 1 </td>
                        <td> 1.00000000 </td>
                        <td> 3 </td>
                        <td> 109.47120255 </td>
                        <td> 2 </td>
                        <td>  -119.99998525 </td>
                        <td> </td>
		

                 </tr>
		   <tr>
                        <td align="center" style="text-align:center" colspan=8> <input type="submit" value="Go to Next Step"/> </td>
                </tr>
	
	<?php
	}
	?>

	
		
		
		
