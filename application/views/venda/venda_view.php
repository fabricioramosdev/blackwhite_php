<!-- begin:: Content Body -->
<div class="k-content__body	k-grid__item k-grid__item--fluid" id="k_content_body">
<div class="k-portlet">
  <div class="k-portlet__body k-portlet__body--fit">
    <div class="k-grid k-grid--desktop-xl k-grid--ver-desktop-xl  k-wizard-v2" id="k_wizard_v2" data-kwizard-state="step-first">
      <div class="k-grid__item k-wizard-v2__aside">

        <!--begin: Form Wizard Nav -->
        <div class="k-wizard-v2__nav">
          <div class="k-wizard-v2__nav-items">
            <a class="k-wizard-v2__nav-item" href="#" data-kwizard-type="step" data-kwizard-state="current">
              <span>1</span><i class="fa fa-check"></i>Nova venda
            </a>
            <a class="k-wizard-v2__nav-item" href="#" data-kwizard-type="step">
              <span>2</span><i class="fa fa-check"></i>Forma de pagamento
            </a>
            <a class="k-wizard-v2__nav-item" href="#" data-kwizard-type="step">
              <span>3</span><i class="fa fa-check"></i> Finalizar veda
            </a>

          </div>
        </div>

        <!--end: Form Wizard Nav -->
      </div>
      <div class="k-grid__item k-grid__item--fluid k-wizard-v2__wrapper">

        <!--begin: Form Wizard Form-->
        <form class="k-form" id="k_form" action="<?php echo base_url() ?>Venda/index" method="post">

          <!--begin: Form Wizard Step 1-->
          <div class="k-wizard-v2__content" data-kwizard-type="step-content" data-kwizard-state="current">
            <div class="k-heading k-heading--md">Create New Account</div>
            <div class="k-separator k-separator--height-xs"></div>
            <div class="k-form__section k-form__section--first">
              <div class="row">
                <div class="col-xl-6">
                  <div class="form-group">
                    <label>Username:</label>
                    <input type="text" class="form-control" name="username" placeholder="Enter username" value="username">
                    <span class="form-text text-muted">Please enter your username</span>
                  </div>
                </div>
                <div class="col-xl-6">
                  <div class="form-group">
                    <label>Password:</label>
                    <input type="password" class="form-control" name="password" placeholder="Enter password" value="password123">
                    <span class="form-text text-muted">Enter your password. Min 6 characters long.</span>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-xl-6">
                  <div class="form-group">
                    <label>Email address:</label>
                    <input type="email" class="form-control" name="email" placeholder="Enter email" value="username@email.com">
                    <span class="form-text text-muted">We'll never share your email with anyone else</span>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <!--end: Form Wizard Step 1-->

          <!--begin: Form Wizard Step 2-->
          <div class="k-wizard-v2__content" data-kwizard-type="step-content">
            <div class="k-heading k-heading--md">Setup Your Profile</div>
            <div class="k-separator k-separator--height-xs"></div>
            <div class="k-form__section k-form__section--first">
              <div class="row">
                <div class="col-xl-6">
                  <div class="form-group">
                    <label>Name:</label>
                    <input type="text" class="form-control" name="name" placeholder="Enter your name" value="Nick Strong">
                    <span class="form-text text-muted">Please enter your full name</span>
                  </div>
                </div>
                <div class="col-xl-6">
                  <div class="form-group">
                    <label>Contact:</label>
                    <input type="text" class="form-control" name="phone" placeholder="Enter your phone number" value="1-541-754-3010">
                    <span class="form-text text-muted">Enter your contact number</span>
                  </div>
                </div>
              </div>
              <div class="k-heading k-heading--md">Mailing Address</div>
              <div class="row">
                <div class="col-lg-6">
                  <div class="form-group">
                    <label>Address Line 1:</label>
                    <input type="text" class="form-control" name="address1" placeholder="" value="Headquarters 1120 N Street Sacramento 916-654-5266">
                  </div>
                  <div class="form-group">
                    <label>City:</label>
                    <input type="text" class="form-control" name="city" placeholder="" value="Polo Alto">
                  </div>
                  <div class="form-group">
                    <label>State:</label>
                    <input type="text" class="form-control" name="state" placeholder="" value="California">
                  </div>
                </div>
                <div class="col-lg-6">
                  <div class="form-group">
                    <label>Address Line 2:</label>
                    <input type="text" class="form-control" name="address2" placeholder="" value="P.O. Box 942873 Sacramento, CA 94273-0001">
                  </div>
                  <div class="form-group">
                    <label>Zip Code:</label>
                    <input type="number" class="form-control" name="zip" placeholder="" value="942873">
                  </div>
                  <div class="form-group">
                    <label>Country:</label>
                    <select name="country" class="form-control">
                      <option value="">Select</option>
                      <option value="AF">Afghanistan</option>
                      <option value="AX">Åland Islands</option>
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
                      <option value="BQ">Bonaire, Sint Eustatius and Saba</option>
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
                      <option value="CI">Côte d'Ivoire</option>
                      <option value="HR">Croatia</option>
                      <option value="CU">Cuba</option>
                      <option value="CW">Curaçao</option>
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
                      <option value="LY">Libya</option>
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
                      <option value="RE">Réunion</option>
                      <option value="RO">Romania</option>
                      <option value="RU">Russian Federation</option>
                      <option value="RW">Rwanda</option>
                      <option value="BL">Saint Barthélemy</option>
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
                      <option value="SX">Sint Maarten (Dutch part)</option>
                      <option value="SK">Slovakia</option>
                      <option value="SI">Slovenia</option>
                      <option value="SB">Solomon Islands</option>
                      <option value="SO">Somalia</option>
                      <option value="ZA">South Africa</option>
                      <option value="GS">South Georgia and the South Sandwich Islands</option>
                      <option value="SS">South Sudan</option>
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
                      <option value="US" selected>United States</option>
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
                </div>
              </div>
            </div>
          </div>

          <!--end: Form Wizard Step 2-->

          <!--begin: Form Wizard Step 3-->
          <div class="k-wizard-v2__content" data-kwizard-type="step-content">
            <div class="k-heading k-heading--md">Setup Your Business Details</div>
            <div class="k-separator k-separator--height-xs"></div>
            <div class="k-form__section k-form__section--first">
              <div class="row">
                <div class="col-xl-6">
                  <div class="form-group">
                    <label>Company Name:</label>
                    <input type="text" class="form-control" name="company_name" placeholder="Enter company name" value="Google Inc.">
                    <span class="form-text text-muted">Please enter your company name</span>
                  </div>
                </div>
                <div class="col-xl-6">
                  <div class="form-group">
                    <label>Company Registered ID:</label>
                    <input type="text" class="form-control" name="company_id" placeholder="Enter your company registered ID" value="123456">
                    <span class="form-text text-muted">Please enter your company registered ID</span>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-xl-6">
                  <div class="form-group">
                    <label>Company Email:</label>
                    <input type="text" class="form-control" name="company_email" placeholder="Enter company email" value="company@email.com">
                    <span class="form-text text-muted">Please enter your company email</span>
                  </div>
                </div>
                <div class="col-xl-6">
                  <div class="form-group">
                    <label>Company Contact:</label>
                    <input type="tel" class="form-control" name="company_tel" placeholder="Enter comapny contact" value="1-541-754-3010">
                    <span class="form-text text-muted">Please enter your comapny contact</span>
                  </div>
                </div>
              </div>
              <div class="form-group">
                <label>Communication:</label>
                <div class="k-checkbox-list">
                  <label class="k-checkbox">
                    <input type="checkbox" name="account_communication[]" value="email" checked> Email
                    <span></span>
                  </label>
                  <label class="k-checkbox">
                    <input type="checkbox" name="account_communication[]" value="sms"> SMS
                    <span></span>
                  </label>
                  <label class="k-checkbox">
                    <input type="checkbox" name="account_communication[]" value="phone"> Phone
                    <span></span>
                  </label>
                </div>
              </div>

              <button type="submit" class="btn btn-primary btn-md btn-tall btn-wide">
                <i class="la la-cart-arrow-down"></i> Finalizar venda
              </button>


            </div>
          </div>

          <!--end: Form Wizard Step 3-->

          <!--begin: Form Actions -->
          <div class="k-form__actions">
            <div class="btn btn-secondary btn-md btn-tall btn-wide k-font-bold k-font-transform-u" data-kwizard-type="action-prev">
              Anterior
            </div>

            <div class="btn btn-info btn-md btn-tall btn-wide k-font-bold k-font-transform-u" data-kwizard-type="action-next">
              Próximo
            </div>
          </div>

          <!--end: Form Actions -->
        </form>

        <!--end: Form Wizard Form-->
      </div>
    </div>
  </div>
</div>
</div>

<!-- end:: Content Body -->



<div class="row">

  <div class="col-lg-4 col-xl-4 order-lg-1 order-xl-1">

    <!--begin::Portlet-->
    <div class="k-portlet k-portlet--fit k-portlet--height-fluid">
      <div class="k-portlet__body k-portlet__body--fluid">
        <div class="k-widget-3 k-widget-3--danger">
          <div class="k-widget-3__content">
            <div class="k-widget-3__content-info">
              <div class="k-widget-3__content-section">
                <div class="k-widget-3__content-title">Itens</div>
              </div>
              <div class="k-widget-3__content-section">
                <span class="k-widget-3__content-number">1</span>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!--end::Portlet-->
  </div>


  <div class="col-lg-4 col-xl-4 order-lg-1 order-xl-1">

<!--begin::Portlet-->
  <div class="k-portlet k-portlet--fit k-portlet--height-fluid">
    <div class="k-portlet__body k-portlet__body--fluid">
      <div class="k-widget-3 k-widget-3--success">
        <div class="k-widget-3__content">
          <div class="k-widget-3__content-info">
            <div class="k-widget-3__content-section">
              <div class="k-widget-3__content-title">Desconto</div>
            </div>
            <div class="k-widget-3__content-section">
              <span class="k-widget-3__content-bedge">R$</span>
              <span class="k-widget-3__content-number">00.00</span>
            </div>
          </div>

        </div>
      </div>
    </div>
  </div>

  <!--end::Portlet-->
    </div>

<div class="col-lg-4 col-xl-4 order-lg-1 order-xl-1">

  <!--begin::Portlet-->
  <div class="k-portlet k-portlet--fit k-portlet--height-fluid">
    <div class="k-portlet__body k-portlet__body--fluid">
      <div class="k-widget-3 k-widget-3--brand">
        <div class="k-widget-3__content">
          <div class="k-widget-3__content-info">
            <div class="k-widget-3__content-section">
              <div class="k-widget-3__content-title">Total venda</div>
            </div>
            <div class="k-widget-3__content-section">
              <span class="k-widget-3__content-bedge">R$</span>
              <span class="k-widget-3__content-number">17.00</span>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!--end::Portlet-->
</div>


</div>
