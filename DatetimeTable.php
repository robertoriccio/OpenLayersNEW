	<?php
	
	 if(ISSET($_GET['Da'])){
		 		 
		 $giornoDa = (int)substr($_GET['Da'], 8, 2);
		 $meseDa = (int)substr($_GET['Da'], 5, 2);
		 $annoDa = (int)substr($_GET['Da'], 0, 4);
		 
		 $giornoA = (int)substr($_GET['A'], 8, 2);
		 $meseA = (int)substr($_GET['A'], 5, 2);
		 $annoA = (int)substr($_GET['A'], 0, 4);
		 
		 
		 
	?>
		
		 <table cellspacing="1" width="96%" style="margin-top:5px; margin-left:18px;">
			<tbody>
			
			<tr height="5px">
			<td width="12%"><span name="dyna_tag"><?php echo $DateFrom; ?></span></td>
			<td width="17%"><select name="giornoDA" id="giornoDA" size="1">
			<?php
			 for ($contatore=1; $contatore < 32; $contatore++) {
				 $stringaGiorno = 0;
				 if($contatore < 10){$stringaGiorno="0".$contatore;}
				 else{$stringaGiorno=$contatore;}
				 if($contatore==$giornoDa){
					 echo "<option value=\"".$stringaGiorno."\" selected=''>".$stringaGiorno."</option>";}
				 else{
					 echo "<option value=\"".$stringaGiorno."\">".$stringaGiorno."</option>";}
			 
			}?>
		 </select><select name="meseDA" id="meseDA" size="1"><?php
		 for ($contatore=1; $contatore < 13; $contatore++) {
			 $stringaGiorno = 0;
			 if($contatore < 10){$stringaGiorno="0".$contatore;}
			 else{$stringaGiorno=$contatore;}
			 if($contatore==$meseDa){
				 echo "<option value=\"".$stringaGiorno."\" selected=''>".$stringaGiorno."</option>";}
			 else{
				 echo "<option value=\"".$stringaGiorno."\">".$stringaGiorno."</option>";}
			 
		 }
		 ?></select><select name="annoDA" id="annoDA" size="1"><?php
		 for ($contatore=2000; $contatore < 2031; $contatore++) {
			 $stringaGiorno = 0;
			 if($contatore < 10){$stringaGiorno="0".$contatore;}
			 else{$stringaGiorno=$contatore;}
			 if($contatore==$annoDa){
				 echo "<option value=\"".$stringaGiorno."\" selected=''>".$stringaGiorno."</option>";}
			 else{
				 echo "<option value=\"".$stringaGiorno."\">".$stringaGiorno."</option>";}
			 
		 }?></select></td>
		 <td width="12%"><button type="button" class="btn btn-primary btn-xs" id="submit" style="margin-left:0px; width:100px;"><?php echo $plot; ?></button> </td>
		 <td><button type="button" class="btn btn-primary btn-xs" id="downloadcsv" style="margin-left:0px; width:100px;">CSV</button> </td>
		 </tr>
		 
		 <tr height="5px">
		 <td width="5%">
			<span name="dyna_tag"><?php echo $To; ?> </span></td>
			<td width="14%"><select name="giornoA" id="giornoA" size="1">
		<?php
		 for ($contatore=1; $contatore < 32; $contatore++) {
			 $stringaGiorno = 0;
			 if($contatore < 10){$stringaGiorno="0".$contatore;}
			 else{$stringaGiorno=$contatore;}
			 if($contatore==$giornoA){
				 echo "<option value=\"".$stringaGiorno."\" selected=''>".$stringaGiorno."</option>";}
			 else{
				 echo "<option value=\"".$stringaGiorno."\">".$stringaGiorno."</option>";}
			 
		 }?></select><select name="meseA" id="meseA" size="1"><?php
		 for ($contatore=1; $contatore < 13; $contatore++) {
			 $stringaGiorno = 0;
			 if($contatore < 10){$stringaGiorno="0".$contatore;}
			 else{$stringaGiorno=$contatore;}
			 if($contatore==$meseA){
				 echo "<option value=\"".$stringaGiorno."\" selected=''>".$stringaGiorno."</option>";}
			 else{
				 echo "<option value=\"".$stringaGiorno."\">".$stringaGiorno."</option>";}
			 
		 }
		 ?></select><select name="annoA" id="annoA" size="1"><?php
		 for ($contatore=2000; $contatore < 2031; $contatore++) {
			 $stringaGiorno = 0;
			 if($contatore < 10){$stringaGiorno="0".$contatore;}
			 else{$stringaGiorno=$contatore;}
			 if($contatore==$annoA){
				 echo "<option value=\"".$stringaGiorno."\" selected=''>".$stringaGiorno."</option>";}
			 else{
				 echo "<option value=\"".$stringaGiorno."\">".$stringaGiorno."</option>";}
			 
		 }?></select></td><td></td><td><button type="button" class="btn btn-primary btn-xs" id="downloadxls" style="margin-left:0px; width:100px;">XLS</button> </td>
		 </tr>	
		 
		 <tr height="5px">
		 <td width="12%">
			<span name="dyna_tag"><?php echo $For; ?> </span>
		 </td>
		 <td width="14%">
			<select name="GIOR" id="orderby" size="1" style="font-size: 12";>
						<option  value="ora"><?php echo $Hours; ?></option>
						<option selected="" value="giorno"><?php echo $Day; ?></option>
			</select>
		 </td><td></td><td><button type="button" class="btn btn-primary btn-xs" id="downloadjpeg" style="margin-left:0px; width:100px;">JPEG</button> </td>
		 </tr>

		
			</tbody>
		</table>
		
	<?php
	 
	 }
	 else{
		 
		 $giorno = date('d');
		 $mese = date('m');
		 $anno = date('Y');
		 ?>
		 <table cellspacing="1" width="96%" style="margin-top:5px; margin-left:18px;">
			<tbody>
			
			<tr height="5px">
			<td width="12%"><span name="dyna_tag"><?php echo $DateFrom; ?></span></td>
			<td width="17%"><select name="giornoDA" id="giornoDA" size="1">
			<?php
			 for ($contatore=1; $contatore < 32; $contatore++) {
				 $stringaGiorno = 0;
				 if($contatore < 10){$stringaGiorno="0".$contatore;}
				 else{$stringaGiorno=$contatore;}
				 if($contatore==$giorno){
					 echo "<option value=\"".$stringaGiorno."\" selected=''>".$stringaGiorno."</option>";}
				 else{
					 echo "<option value=\"".$stringaGiorno."\">".$stringaGiorno."</option>";}
			 
			}?>
		 </select><select name="meseDA" id="meseDA" size="1"><?php
		 for ($contatore=1; $contatore < 13; $contatore++) {
			 $stringaGiorno = 0;
			 if($contatore < 10){$stringaGiorno="0".$contatore;}
			 else{$stringaGiorno=$contatore;}
			 if($contatore==$mese){
				 echo "<option value=\"".$stringaGiorno."\" selected=''>".$stringaGiorno."</option>";}
			 else{
				 echo "<option value=\"".$stringaGiorno."\">".$stringaGiorno."</option>";}
			 
		 }
		 ?></select><select name="annoDA" id="annoDA" size="1"><?php
		 for ($contatore=2000; $contatore < 2031; $contatore++) {
			 $stringaGiorno = 0;
			 if($contatore < 10){$stringaGiorno="0".$contatore;}
			 else{$stringaGiorno=$contatore;}
			 if($contatore==$anno){
				 echo "<option value=\"".$stringaGiorno."\" selected=''>".$stringaGiorno."</option>";}
			 else{
				 echo "<option value=\"".$stringaGiorno."\">".$stringaGiorno."</option>";}
			 
		 }?></select></td>
		 <td width="12%"><button type="button" class="btn btn-primary btn-xs" id="submit" style="margin-left:0px; width:100px;"><?php echo $plot; ?></button> </td>
		 <td><button type="button" class="btn btn-primary btn-xs" id="downloadcsv" style="margin-left:0px; width:100px;">CSV</button> </td>
		 </tr>
		 
		 <tr height="5px">
		 <td width="5%">
			<span name="dyna_tag"><?php echo $To; ?> </span></td>
			<td width="14%"><select name="giornoA" id="giornoA" size="1">
		<?php
		 for ($contatore=1; $contatore < 32; $contatore++) {
			 $stringaGiorno = 0;
			 if($contatore < 10){$stringaGiorno="0".$contatore;}
			 else{$stringaGiorno=$contatore;}
			 if($contatore==$giorno){
				 echo "<option value=\"".$stringaGiorno."\" selected=''>".$stringaGiorno."</option>";}
			 else{
				 echo "<option value=\"".$stringaGiorno."\">".$stringaGiorno."</option>";}
			 
		 }?></select><select name="meseA" id="meseA" size="1"><?php
		 for ($contatore=1; $contatore < 13; $contatore++) {
			 $stringaGiorno = 0;
			 if($contatore < 10){$stringaGiorno="0".$contatore;}
			 else{$stringaGiorno=$contatore;}
			 if($contatore==$mese){
				 echo "<option value=\"".$stringaGiorno."\" selected=''>".$stringaGiorno."</option>";}
			 else{
				 echo "<option value=\"".$stringaGiorno."\">".$stringaGiorno."</option>";}
			 
		 }
		 ?></select><select name="annoA" id="annoA" size="1"><?php
		 for ($contatore=2000; $contatore < 2031; $contatore++) {
			 $stringaGiorno = 0;
			 if($contatore < 10){$stringaGiorno="0".$contatore;}
			 else{$stringaGiorno=$contatore;}
			 if($contatore==$anno){
				 echo "<option value=\"".$stringaGiorno."\" selected=''>".$stringaGiorno."</option>";}
			 else{
				 echo "<option value=\"".$stringaGiorno."\">".$stringaGiorno."</option>";}
			 
		 }?></select></td><td></td><td><button type="button" class="btn btn-primary btn-xs" id="downloadxls" style="margin-left:0px; width:100px;">XLS</button> </td>
		 </tr>	
		 
		 <tr height="5px">
		 <td width="12%">
			<span name="dyna_tag"><?php echo $For; ?> </span>
		 </td>
		 <td width="14%">
			<select name="GIOR" id="orderby" size="1" style="font-size: 12";>
						<option  value="ora"><?php echo $Hours; ?></option>
						<option selected="" value="giorno"><?php echo $Day; ?></option>
			</select>
		 </td><td></td><td><button type="button" class="btn btn-primary btn-xs" id="downloadjpeg" style="margin-left:0px; width:100px;">JPEG</button> </td>
		 </tr>

		
			</tbody>
		</table>
		
		<?php
	 
	 
	 
	 
	 
	 
	 }

	?>
		
		
	
