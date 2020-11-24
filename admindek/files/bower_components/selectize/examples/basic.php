<?php 
include 'insert.php';
?>
<!DOCTYPE html>
<!--[if lt IE 7]><html class="no-js lt-ie9 lt-ie8 lt-ie7"><![endif]-->
<!--[if IE 7]><html class="no-js lt-ie9 lt-ie8"><![endif]-->
<!--[if IE 8]><html class="no-js lt-ie9"><![endif]-->
<!--[if gt IE 8]><!--><html class="no-js"><!--<![endif]-->
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
		<title>Selectize.js Demo</title>
		<meta name="description" content="">
		<meta name="viewport" content="width=device-width,initial-scale=1,maximum-scale=1">
		<link rel="stylesheet" href="css/normalize.css">
		<link rel="stylesheet" href="css/stylesheet.css">
		<!--[if IE 8]><script src="js/es5.js"></script><![endif]-->
		<script src="js/jquery.min.js"></script>
		<script src="../dist/js/standalone/selectize.js"></script>
		<script src="js/index.js"></script>
	</head>
    <body>
		<div id="wrapper">
			<h1>Selectize.js</h1>

			<!-- <div class="demo">
				<h2>&lt;input type="text"&gt;</h2>
				<div class="control-group">
					<label for="input-tags">Tags:</label>
					<input type="text" id="input-tags" class="demo-default" value="awesome,neat">
				</div>
				<script>
				$('#input-tags').selectize({
					persist: false,
					createOnBlur: true,
					create: true
				});
				</script>
			</div> -->

			<div class="demo">
				<h2>&lt;select&gt;</h2>
				<div class="control-group">
					<label for="select-beast">Beast:</label>
					<select id="select-beast" class="" placeholder="Select a person...">
						<option value="">Select a person...</option>
						<?php 
						$sql = mysqli_query($conn, "SELECT * FROM jabatan");
						while($row = mysqli_fetch_array($sql)){ ?>
						<option value="<?php echo $row['ID_JABATAN'];?>"><?php echo $row['NM_JABATAN'];?></option>
						<?php 
						}
						?>
					</select>
				</div>
				<script>
			    $('#select-beast').selectize({
				    create: function (input, callback){
				        callback({
				        	//membuat id
				        	<?php 
							$query1     = "SELECT max(ID_JABATAN) AS idcb FROM jabatan WHERE ID_JABATAN LIKE '%C%'";
							$hasil1     = mysqli_query($conn, $query1);
							if (mysqli_num_rows($hasil1)>0) {
							    $row1 = mysqli_fetch_array($hasil1);
							    $idmax       = $row1['idcb'];
							    $id_urut     = (int)substr($idmax,2,4);
							    $id_urut++;
							    $idcb = "C-".sprintf("%04s",$id_urut);
							}else{
							    $idcb ="C-0000";
							}
							?>
							//memasukkan id menjadi value pada select option
				            value: '<?php echo $idcb;?>', // probably your ID created or something
				            text: input
				        });
				        //menyimpan data baru melalui page lain
				        $.ajax({
				            type: "POST",
				            data: ({id : ""+'<?php echo $idcb;?>', nama : ""+input}),
				            url: "insert.php",
				            success: function(data) {
				                alert('berhasil');
				            }
				        });
				    }
				});
				</script>
			</div>

			<div class="demo">
				<h2>&lt;select&gt; (allow empty)</h2>
				<div class="control-group">
					<label for="select-beast-empty">Beast:</label>
					<select id="select-beast-empty" class="demo-default" data-placeholder="Select a person...">
						<option value="">None</option>
						<option value="4">Thomas Edison</option>
						<option value="1">Nikola</option>
						<option value="3">Nikola Tesla</option>
						<option value="5">Arnold Schwarzenegger</option>
					</select>
				</div>
				<script>
				$('#select-beast-empty').selectize({
					allowEmptyOption: true,
					create: true
				});
				</script>
			</div>

			<div class="demo">
				<h2>&lt;select&gt; (disabled)</h2>
				<div class="control-group">
					<label for="select-beast-disabled">Beast:</label>
					<select id="select-beast-disabled" class="demo-default" disabled placeholder="Select a person...">
						<option value="">Select a person...</option>
						<option value="4">Thomas Edison</option>
						<option value="1">Nikola</option>
						<option value="3" selected>Nikola Tesla</option>
					</select>
				</div>
				<script>
					$('#select-beast-disabled').selectize({
						create: true,
						sortField: {field: 'text'}
					});
				</script>
			</div>

			<div class="demo">
				<h2>&lt;select&gt; (&lt;option disabled&gt;)</h2>
				<div class="control-group">
					<label for="select-beast-single-disabled">Beast:</label>
					<select id="select-beast-single-disabled" class="demo-default" placeholder="Select a person...">
						<option value="">Select a person...</option>
						<option value="4" disabled>Thomas Edison</option>
						<option value="1">Nikola</option>
						<option value="3" selected>Nikola Tesla</option>
					</select>
				</div>
				<script>
					$('#select-beast-single-disabled').selectize({
						create: true,
						sortField: {field: 'text'}
					});
				</script>
			</div>

			<div class="demo">
				<h2>&lt;select multiple&gt;</h2>
				<div class="control-group">
					<label for="select-state">States:</label>
					<select id="select-state" name="state[]" multiple class="demo-default" style="width:50%" placeholder="Select a state...">
						<option value="">Select a state...</option>
						<option value="AL">Alabama</option>
						<option value="AK">Alaska</option>
						<option value="AZ">Arizona</option>
						<option value="AR">Arkansas</option>
						<option value="CA" selected>California</option>
						<option value="CO">Colorado</option>
						<option value="CT">Connecticut</option>
						<option value="DE">Delaware</option>
						<option value="DC">District of Columbia</option>
						<option value="FL">Florida</option>
						<option value="GA">Georgia</option>
						<option value="HI">Hawaii</option>
						<option value="ID">Idaho</option>
						<option value="IL">Illinois</option>
						<option value="IN">Indiana</option>
						<option value="IA">Iowa</option>
						<option value="KS">Kansas</option>
						<option value="KY">Kentucky</option>
						<option value="LA">Louisiana</option>
						<option value="ME">Maine</option>
						<option value="MD">Maryland</option>
						<option value="MA">Massachusetts</option>
						<option value="MI">Michigan</option>
						<option value="MN">Minnesota</option>
						<option value="MS">Mississippi</option>
						<option value="MO">Missouri</option>
						<option value="MT">Montana</option>
						<option value="NE">Nebraska</option>
						<option value="NV">Nevada</option>
						<option value="NH">New Hampshire</option>
						<option value="NJ">New Jersey</option>
						<option value="NM">New Mexico</option>
						<option value="NY">New York</option>
						<option value="NC">North Carolina</option>
						<option value="ND">North Dakota</option>
						<option value="OH">Ohio</option>
						<option value="OK">Oklahoma</option>
						<option value="OR">Oregon</option>
						<option value="PA">Pennsylvania</option>
						<option value="RI">Rhode Island</option>
						<option value="SC">South Carolina</option>
						<option value="SD">South Dakota</option>
						<option value="TN">Tennessee</option>
						<option value="TX">Texas</option>
						<option value="UT">Utah</option>
						<option value="VT">Vermont</option>
						<option value="VA">Virginia</option>
						<option value="WA">Washington</option>
						<option value="WV">West Virginia</option>
						<option value="WI">Wisconsin</option>
						<option value="WY" selected>Wyoming</option>
					</select>
				</div>
				<script>
				$('#select-state').selectize({
					maxItems: 3
				});
				</script>
			</div>
			<div class="demo">
				<div class="control-group">
					<label for="select-country">Country:</label>
					<select id="select-country" class="demo-default" placeholder="Select a country...">
					    <option value="">Select a country...</option>
						<option value="AF">Afghanistan</option>
					    <option value="AX">&Aring;land Islands</option>
					    <option value="AL">Albania</option>
					    <option value="DZ">Algeria</option>
					    <option value="AS">American Samoa</option>
					    <option value="AD">Andorra</option>
					    <option value="AO">Angola</option>
					    <option value="AI">Anguilla</option>
					    <option value="AQ">Antarctica</option>
					    <option value="AG">Antigua and Barbuda</option>
					    <option value="AR">Argentina</option>
					    <option value="AM">Armenia</option>
					    <option value="AW">Aruba</option>
					    <option value="AU">Australia</option>
					    <option value="AT">Austria</option>
					    <option value="AZ">Azerbaijan</option>
					    <option value="BS">Bahamas</option>
					    <option value="BH">Bahrain</option>
					    <option value="BD">Bangladesh</option>
					    <option value="BB">Barbados</option>
					    <option value="BY">Belarus</option>
					    <option value="BE">Belgium</option>
					    <option value="BZ">Belize</option>
					    <option value="BJ">Benin</option>
					    <option value="BM">Bermuda</option>
					    <option value="BT">Bhutan</option>
					    <option value="BO">Bolivia, Plurinational State of</option>
					    <option value="BA">Bosnia and Herzegovina</option>
					    <option value="BW">Botswana</option>
					    <option value="BV">Bouvet Island</option>
					    <option value="BR">Brazil</option>
					    <option value="IO">British Indian Ocean Territory</option>
					    <option value="BN">Brunei Darussalam</option>
					    <option value="BG">Bulgaria</option>
					    <option value="BF">Burkina Faso</option>
					    <option value="BI">Burundi</option>
					    <option value="KH">Cambodia</option>
					    <option value="CM">Cameroon</option>
					    <option value="CA">Canada</option>
					    <option value="CV">Cape Verde</option>
					    <option value="KY">Cayman Islands</option>
					    <option value="CF">Central African Republic</option>
					    <option value="TD">Chad</option>
					    <option value="CL">Chile</option>
					    <option value="CN">China</option>
					    <option value="CX">Christmas Island</option>
					    <option value="CC">Cocos (Keeling) Islands</option>
					    <option value="CO">Colombia</option>
					    <option value="KM">Comoros</option>
					    <option value="CG">Congo</option>
					    <option value="CD">Congo, the Democratic Republic of the</option>
					    <option value="CK">Cook Islands</option>
					    <option value="CR">Costa Rica</option>
					    <option value="CI">C&ocirc;te d'Ivoire</option>
					    <option value="HR">Croatia</option>
					    <option value="CU">Cuba</option>
					    <option value="CY">Cyprus</option>
					    <option value="CZ">Czech Republic</option>
					    <option value="DK">Denmark</option>
					    <option value="DJ">Djibouti</option>
					    <option value="DM">Dominica</option>
					    <option value="DO">Dominican Republic</option>
					    <option value="EC">Ecuador</option>
					    <option value="EG">Egypt</option>
					    <option value="SV">El Salvador</option>
					    <option value="GQ">Equatorial Guinea</option>
					    <option value="ER">Eritrea</option>
					    <option value="EE">Estonia</option>
					    <option value="ET">Ethiopia</option>
					    <option value="FK">Falkland Islands (Malvinas)</option>
					    <option value="FO">Faroe Islands</option>
					    <option value="FJ">Fiji</option>
					    <option value="FI">Finland</option>
					    <option value="FR">France</option>
					    <option value="GF">French Guiana</option>
					    <option value="PF">French Polynesia</option>
					    <option value="TF">French Southern Territories</option>
					    <option value="GA">Gabon</option>
					    <option value="GM">Gambia</option>
					    <option value="GE">Georgia</option>
					    <option value="DE">Germany</option>
					    <option value="GH">Ghana</option>
					    <option value="GI">Gibraltar</option>
					    <option value="GR">Greece</option>
					    <option value="GL">Greenland</option>
					    <option value="GD">Grenada</option>
					    <option value="GP">Guadeloupe</option>
					    <option value="GU">Guam</option>
					    <option value="GT">Guatemala</option>
					    <option value="GG">Guernsey</option>
					    <option value="GN">Guinea</option>
					    <option value="GW">Guinea-Bissau</option>
					    <option value="GY">Guyana</option>
					    <option value="HT">Haiti</option>
					    <option value="HM">Heard Island and McDonald Islands</option>
					    <option value="VA">Holy See (Vatican City State)</option>
					    <option value="HN">Honduras</option>
					    <option value="HK">Hong Kong</option>
					    <option value="HU">Hungary</option>
					    <option value="IS">Iceland</option>
					    <option value="IN">India</option>
					    <option value="ID">Indonesia</option>
					    <option value="IR">Iran, Islamic Republic of</option>
					    <option value="IQ">Iraq</option>
					    <option value="IE">Ireland</option>
					    <option value="IM">Isle of Man</option>
					    <option value="IL">Israel</option>
					    <option value="IT">Italy</option>
					    <option value="JM">Jamaica</option>
					    <option value="JP">Japan</option>
					    <option value="JE">Jersey</option>
					    <option value="JO">Jordan</option>
					    <option value="KZ">Kazakhstan</option>
					    <option value="KE">Kenya</option>
					    <option value="KI">Kiribati</option>
					    <option value="KP">Korea, Democratic People's Republic of</option>
					    <option value="KR">Korea, Republic of</option>
					    <option value="KW">Kuwait</option>
					    <option value="KG">Kyrgyzstan</option>
					    <option value="LA">Lao People's Democratic Republic</option>
					    <option value="LV">Latvia</option>
					    <option value="LB">Lebanon</option>
					    <option value="LS">Lesotho</option>
					    <option value="LR">Liberia</option>
					    <option value="LY">Libyan Arab Jamahiriya</option>
					    <option value="LI">Liechtenstein</option>
					    <option value="LT">Lithuania</option>
					    <option value="LU">Luxembourg</option>
					    <option value="MO">Macao</option>
					    <option value="MK">Macedonia, the former Yugoslav Republic of</option>
					    <option value="MG">Madagascar</option>
					    <option value="MW">Malawi</option>
					    <option value="MY">Malaysia</option>
					    <option value="MV">Maldives</option>
					    <option value="ML">Mali</option>
					    <option value="MT">Malta</option>
					    <option value="MH">Marshall Islands</option>
					    <option value="MQ">Martinique</option>
					    <option value="MR">Mauritania</option>
					    <option value="MU">Mauritius</option>
					    <option value="YT">Mayotte</option>
					    <option value="MX">Mexico</option>
					    <option value="FM">Micronesia, Federated States of</option>
					    <option value="MD">Moldova, Republic of</option>
					    <option value="MC">Monaco</option>
					    <option value="MN">Mongolia</option>
					    <option value="ME">Montenegro</option>
					    <option value="MS">Montserrat</option>
					    <option value="MA">Morocco</option>
					    <option value="MZ">Mozambique</option>
					    <option value="MM">Myanmar</option>
					    <option value="NA">Namibia</option>
					    <option value="NR">Nauru</option>
					    <option value="NP">Nepal</option>
					    <option value="NL">Netherlands</option>
					    <option value="AN">Netherlands Antilles</option>
					    <option value="NC">New Caledonia</option>
					    <option value="NZ">New Zealand</option>
					    <option value="NI">Nicaragua</option>
					    <option value="NE">Niger</option>
					    <option value="NG">Nigeria</option>
					    <option value="NU">Niue</option>
					    <option value="NF">Norfolk Island</option>
					    <option value="MP">Northern Mariana Islands</option>
					    <option value="NO">Norway</option>
					    <option value="OM">Oman</option>
					    <option value="PK">Pakistan</option>
					    <option value="PW">Palau</option>
					    <option value="PS">Palestinian Territory, Occupied</option>
					    <option value="PA">Panama</option>
					    <option value="PG">Papua New Guinea</option>
					    <option value="PY">Paraguay</option>
					    <option value="PE">Peru</option>
					    <option value="PH">Philippines</option>
					    <option value="PN">Pitcairn</option>
					    <option value="PL">Poland</option>
					    <option value="PT">Portugal</option>
					    <option value="PR">Puerto Rico</option>
					    <option value="QA">Qatar</option>
					    <option value="RE">R&eacute;union</option>
					    <option value="RO">Romania</option>
					    <option value="RU">Russian Federation</option>
					    <option value="RW">Rwanda</option>
					    <option value="BL">Saint Barth&eacute;lemy</option>
					    <option value="SH">Saint Helena, Ascension and Tristan da Cunha</option>
					    <option value="KN">Saint Kitts and Nevis</option>
					    <option value="LC">Saint Lucia</option>
					    <option value="MF">Saint Martin (French part)</option>
					    <option value="PM">Saint Pierre and Miquelon</option>
					    <option value="VC">Saint Vincent and the Grenadines</option>
					    <option value="WS">Samoa</option>
					    <option value="SM">San Marino</option>
					    <option value="ST">Sao Tome and Principe</option>
					    <option value="SA">Saudi Arabia</option>
					    <option value="SN">Senegal</option>
					    <option value="RS">Serbia</option>
					    <option value="SC">Seychelles</option>
					    <option value="SL">Sierra Leone</option>
					    <option value="SG">Singapore</option>
					    <option value="SK">Slovakia</option>
					    <option value="SI">Slovenia</option>
					    <option value="SB">Solomon Islands</option>
					    <option value="SO">Somalia</option>
					    <option value="ZA">South Africa</option>
					    <option value="GS">South Georgia and the South Sandwich Islands</option>
					    <option value="ES">Spain</option>
					    <option value="LK">Sri Lanka</option>
					    <option value="SD">Sudan</option>
					    <option value="SR">Suriname</option>
					    <option value="SJ">Svalbard and Jan Mayen</option>
					    <option value="SZ">Swaziland</option>
					    <option value="SE">Sweden</option>
					    <option value="CH">Switzerland</option>
					    <option value="SY">Syrian Arab Republic</option>
					    <option value="TW">Taiwan, Province of China</option>
					    <option value="TJ">Tajikistan</option>
					    <option value="TZ">Tanzania, United Republic of</option>
					    <option value="TH">Thailand</option>
					    <option value="TL">Timor-Leste</option>
					    <option value="TG">Togo</option>
					    <option value="TK">Tokelau</option>
					    <option value="TO">Tonga</option>
					    <option value="TT">Trinidad and Tobago</option>
					    <option value="TN">Tunisia</option>
					    <option value="TR">Turkey</option>
					    <option value="TM">Turkmenistan</option>
					    <option value="TC">Turks and Caicos Islands</option>
					    <option value="TV">Tuvalu</option>
					    <option value="UG">Uganda</option>
					    <option value="UA">Ukraine</option>
					    <option value="AE">United Arab Emirates</option>
					    <option value="GB">United Kingdom</option>
					    <option value="US">United States</option>
					    <option value="UM">United States Minor Outlying Islands</option>
					    <option value="UY">Uruguay</option>
					    <option value="UZ">Uzbekistan</option>
					    <option value="VU">Vanuatu</option>
					    <option value="VE">Venezuela, Bolivarian Republic of</option>
					    <option value="VN">Viet Nam</option>
					    <option value="VG">Virgin Islands, British</option>
					    <option value="VI">Virgin Islands, U.S.</option>
					    <option value="WF">Wallis and Futuna</option>
					    <option value="EH">Western Sahara</option>
					    <option value="YE">Yemen</option>
					    <option value="ZM">Zambia</option>
					    <option value="ZW">Zimbabwe</option>
					</select>
				</div>
				<script>
				$('#select-country').selectize();
				</script>
			</div>


			<div class="demo">
				<h2>&lt;select multiple&gt; (disabled)</h2>
				<div class="control-group">
					<label for="select-state-disabled">States:</label>
					<select id="select-state-disabled" name="state[]" multiple disabled class="demo-default" style="width:50%" placeholder="Select a state...">
						<option value="">Select a state...</option>
						<option value="AL">Alabama</option>
						<option value="AK">Alaska</option>
						<option value="AZ">Arizona</option>
						<option value="AR">Arkansas</option>
						<option value="CA" selected>California</option>
						<option value="CO">Colorado</option>
						<option value="CT">Connecticut</option>
						<option value="DE">Delaware</option>
						<option value="DC">District of Columbia</option>
						<option value="FL">Florida</option>
						<option value="GA">Georgia</option>
						<option value="HI">Hawaii</option>
						<option value="ID">Idaho</option>
						<option value="IL">Illinois</option>
						<option value="IN">Indiana</option>
						<option value="IA">Iowa</option>
						<option value="KS">Kansas</option>
						<option value="KY">Kentucky</option>
						<option value="LA">Louisiana</option>
						<option value="ME">Maine</option>
						<option value="MD">Maryland</option>
						<option value="MA">Massachusetts</option>
						<option value="MI">Michigan</option>
						<option value="MN">Minnesota</option>
						<option value="MS">Mississippi</option>
						<option value="MO">Missouri</option>
						<option value="MT">Montana</option>
						<option value="NE">Nebraska</option>
						<option value="NV">Nevada</option>
						<option value="NH">New Hampshire</option>
						<option value="NJ">New Jersey</option>
						<option value="NM">New Mexico</option>
						<option value="NY">New York</option>
						<option value="NC">North Carolina</option>
						<option value="ND">North Dakota</option>
						<option value="OH">Ohio</option>
						<option value="OK">Oklahoma</option>
						<option value="OR">Oregon</option>
						<option value="PA">Pennsylvania</option>
						<option value="RI">Rhode Island</option>
						<option value="SC">South Carolina</option>
						<option value="SD">South Dakota</option>
						<option value="TN">Tennessee</option>
						<option value="TX">Texas</option>
						<option value="UT">Utah</option>
						<option value="VT">Vermont</option>
						<option value="VA">Virginia</option>
						<option value="WA">Washington</option>
						<option value="WV">West Virginia</option>
						<option value="WI">Wisconsin</option>
						<option value="WY" selected>Wyoming</option>
					</select>
				</div>
				<script>
				$('#select-state-disabled').selectize({
					maxItems: 3
				});
				</script>
			</div>
		</div>
	</body>
</html>
