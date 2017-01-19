<br><span style="font-family: Verdana, Arial, Helvetica;font-size: 16px; margin-top:30px; margin-left:8px;"><b><?php echo $climateVariable; ?></b></span>

	
	<table cellspacing="2" cellpadding="0" width="94%" style="margin-top:5px;  margin-left:18px;"><tbody>
	
	<tr>
	<td><span style="font-family: Verdana, Arial, Helvetica;font-size: 13px; margin-top:30px;"><b><?php echo $Air; ?></span></td></tr>
	<tr><td><span name="dyna_tag"><?php echo $precipitation; ?>:</span></td><td>
	<select name="GIOR" id="precipitation" size="1" style="width:150px;">
	<option  value="no"></option>
	<option  value="precipitation"><?php echo $precipitation; ?></option>
	</select>
	</td>
	<td><span name="dyna_tag"><?php echo $Temperature; ?>:</span></td><td>
	<select name="GIOR" id="temperature" size="1" style="width:150px;">
	<option  value="no"></option>
	<option  value="meantemp"><?php echo $MeanTemperature; ?></option>
	<option  value="mintemp"><?php echo $MinimumTemperature; ?></option>
	<option  value="maxtemp"><?php echo $MaximumTemperature; ?></option>
	</select>
	</td>
	<td><span name="dyna_tag"><?php echo $Humidity; ?>:</span></td><td>
	<select name="GIOR" id="humidity" size="1" style="width:150px;">
	<option  value="no"></option>
	<option  value="hummax"><?php echo $HumMax; ?></option>
	<option  value="hummean"><?php echo $HumMean; ?></option>
	<option  value="hummin"><?php echo $HumMin; ?></option>
	</select>
	</td></tr><tr>
	<td><span name="dyna_tag"><?php echo $Pression; ?>:</span></td><td>
	<select name="GIOR" id="pression" size="1" style="width:150px;">
	<option  value="no"></option>
	<option  value="pressmax"><?php echo $PressMax; ?></option>
	<option  value="pressmin"><?php echo $PressMin; ?></option>
	<option  value="pressmean"><?php echo $PressMean; ?></option>
	</select>
	</td>
	<td><span name="dyna_tag"><?php echo $Radiation; ?>:</span></td><td>
	<select name="GIOR" id="radiation" size="1" style="width:150px;">
	<option  value="no"></option>
	<option  value="radint"><?php echo $RadInt; ?></option>
	<option  value="radmean"><?php echo $RadMean; ?></option>
	</select>
	</td>
	<td><span name="dyna_tag"><?php echo $Wind; ?>:</span></td><td>
	<select name="GIOR" id="wind" size="1" style="width:150px;">
	<option  value="no"></option>
	<option  value="winddir"><?php echo $WindDir; ?></option>
	<option  value="windspeed"><?php echo $WindSpeed; ?></option>
	</select>
	</td>
	</tr>
	<tr>
	<td><span style="font-family: Verdana, Arial, Helvetica;font-size: 13px; margin-top:30px;"><b><?php echo $Soil; ?></span></td></tr>
	<tr>
	<td><span name="dyna_tag"><?php echo $TSoil; ?>:</span></td><td>
	<select name="GIOR" id="tsoil" size="1" style="width:150px;">
	<option  value="no"></option>
	<option  value="tsoil"><?php echo $TSoil; ?></option>
	</select>
	</td>
	<td><span name="dyna_tag"><?php echo $HrSoil; ?>:</span></td><td>
	<select name="GIOR" id="hrsoil" size="1" style="width:150px;">
	<option  value="no"></option>
	<option  value="hrsoil"><?php echo $HrSoil; ?></option>
	</select>
	</td>
	</tr>
	<tr>
	<td><span style="font-family: Verdana, Arial, Helvetica;font-size: 13px; margin-top:30px;"><b><?php echo $Plant; ?></span></td></tr>
	<tr>
	<td><span name="dyna_tag"><?php echo $LeafWet; ?>:</span></td><td>
	<select name="GIOR" id="leafwet" size="1" style="width:150px;">
	<option  value="no"></option>
	<option  value="leafwet"><?php echo $LeafWet; ?></option>
	</select>
	</td>
	</tr>

	</tbody></table>