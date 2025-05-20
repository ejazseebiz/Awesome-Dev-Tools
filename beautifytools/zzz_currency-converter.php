
 <link rel="stylesheet" type="text/css" href="<?php echo $plug_fl; ?>css/currency_converter.css" media="all"/>
<link rel="stylesheet" type="text/css" href="<?php echo $plug_fl; ?>css/common.css" media="all"/></head>




        
        <div class="row">
        	<div class="col-md-12">
            	<p>Currency Converter converts a currency to another currency with the latest exchange rates. Get the latest exchange rates of all currencies. Use this Currency Converter to convert a currency to another currency with the latest exchange rates. Please select the proper currencies, enter your amount and click convert. You'll get your converted currency and latest exchange rates of those currencies.</p>
                <div class="well well-sm">
                	<form class="form-horizontal" action="#" method="post">
                        <fieldset>
                        
                        <!-- Select Basic -->
                        <div class="form-group">
                          <label class="col-md-2 control-label" for="from">From</label>
                          <div class="col-md-10">
                            <select data_code="PKR" id="from" name="from" class="form-control">
                            	<option value="USD">United States Dollars $</option>
                                <option value="EUR">Euro €</option>
                                <option value="GBP" selected>United Kingdom Pounds £</option>
                                <option value="JPY">Japan Yen ¥</option>
                                <option value="AFN">Afghanistan Afghanis ؋</option>
                                <option value="ALL">Albania Leke Lek</option>
                                <option value="DZD">Algeria Dinars DA</option>
                                <option value="ARS">Argentina Pesos $</option>
                                <option value="AUD">Australia Dollars $</option>
                                <option value="BSD">Bahamas Dollars $</option>
                                <option value="BHD">Bahrain Dinars BD</option>
                                <option value="BDT">Bangladesh Taka Tk</option>
                                <option value="BBD">Barbados Dollars $</option>
                                <option value="BMD">Bermuda Dollars $</option>
                                <option value="BRL">Brazil Reais R$</option>
                                <option value="BGN">Bulgaria Leva лв</option>
                                <option value="CAD">Canada Dollars $</option>
                                <option value="XOF">CFA Francs BCEAO CFAF</option>
                                <option value="XAF">CFA Francs BEAC CFAF</option>
                                <option value="XPF">CFP Francs </option>
                                <option value="CLP">Chile Pesos $</option>
                                <option value="CNY">China Yuan Renminbi 元</option>
                                <option value="COP">Colombia Pesos $</option>
                                <option value="CRC">Costa Rica Colones ₡</option>
                                <option value="HRK">Croatia Kuna kn</option>
                                <option value="CYP">Cyprus Pounds £</option>
                                <option value="CZK">Czech Republic Koruny Kč</option>
                                <option value="DKK">Denmark Kroner kr</option>
                                <option value="DOP">Dominican Republic Pesos RD$</option>
                                <option value="XCD">East Caribbean Dollars $</option>
                                <option value="EGP">Egypt Pounds £</option>
                                <option value="EEK">Estonia Krooni kr</option>
                                <option value="FJD">Fiji Dollars $</option>
                                <option value="HKD">Hong Kong Dollars 元</option>
                                <option value="HUF">Hungary Forint Ft</option>
                                <option value="ISK">Iceland Kronur kr</option>
                                <option value="XDR">IMF Special Drawing Rights </option>
                                <option value="INR">India Rupees ₨</option>
                                <option value="IDR">Indonesia Rupiahs Rp</option>
                                <option value="IRR">Iran Rials ﷼</option>
                                <option value="IQD">Iraq Dinars ID</option>
                                <option value="ILS">Israel New Shekels ₪</option>
                                <option value="JMD">Jamaica Dollars J$</option>
                                <option value="JOD">Jordan Dinars JD</option>
                                <option value="KZT">Kazakhstan Tenge лв</option>
                                <option value="KES">Kenya Shillings K Sh</option>
                                <option value="KWD">Kuwait Dinars KD</option>
                                <option value="LBP">Lebanon Pounds £</option>
                                <option value="MYR">Malaysia Ringgits RM</option>
                                <option value="MTL">Malta Liri Lm</option>
                                <option value="MUR">Mauritius Rupees ₨</option>
                                <option value="MXN">Mexico Pesos $</option>
                                <option value="MAD">Morocco Dirhams DH</option>
                                <option value="NZD">New Zealand Dollars $</option>
                                <option value="NGN">Nigeria Nairas ₦</option>
                                <option value="NOK">Norway Kroner kr</option>
                                <option value="OMR">Oman Rials ﷼</option>
                                <option value="PKR">Pakistan Rupees ₨</option>
                                <option value="XPD">Palladium Ounces </option>
                                <option value="PEN">Peru Nuevos Soles S/.</option>
                                <option value="PHP">Philippines Pesos Php</option>
                                <option value="PLN">Poland Zlotych zł</option>
                                <option value="QAR">Qatar Riyals ﷼</option>
                                <option value="RON">Romania New Lei lei</option>
                                <option value="RUB">Russia Rubles руб</option>
                                <option value="SAR">Saudi Arabia Riyals ﷼</option>
                                <option value="XAG">Silver Ounces </option>
                                <option value="SGD">Singapore Dollars $</option>
                                <option value="ZAR">South Africa Rand R</option>
                                <option value="KRW">South Korea Won ₩</option>
                                <option value="LKR">Sri Lanka Rupees ₨</option>
                                <option value="SDG">Sudan Pounds </option>
                                <option value="SEK">Sweden Kronor kr</option>
                                <option value="CHF">Switzerland Francs CHF</option>
                                <option value="TWD">Taiwan New Dollars NT$</option>
                                <option value="THB">Thailand Baht ฿</option>
                                <option value="TTD">Trinidad and Tobago Dollars TT$</option>
                                <option value="TND">Tunisia Dinars TD</option>
                                <option value="TRY">Turkey Lira YTL</option>
                                <option value="AED">United Arab Emirates Dirhams Dh</option>
                                <option value="VEF">Venezuela Bolivares Fuertes </option>
                                <option value="VND">Vietnam Dong ₫</option>
                                <option value="ZMK">Zambia Kwacha ZK</option>
                            </select>
                          </div>
                        </div>
                        
                        <!-- Select Basic -->
                        <div class="form-group">
                          <label class="col-md-2 control-label" for="to">To</label>
                          <div class="col-md-10">
                            <select id="to" name="to" class="form-control">
                            	<option value="USD">United States Dollars $</option>
                                <option value="EUR">Euro €</option>
                                <option value="GBP">United Kingdom Pounds £</option>
                                <option value="JPY">Japan Yen ¥</option>
                                <option value="AFN">Afghanistan Afghanis ؋</option>
                                <option value="ALL">Albania Leke Lek</option>
                                <option value="DZD">Algeria Dinars DA</option>
                                <option value="ARS">Argentina Pesos $</option>
                                <option value="AUD">Australia Dollars $</option>
                                <option value="BSD">Bahamas Dollars $</option>
                                <option value="BHD">Bahrain Dinars BD</option>
                                <option value="BDT">Bangladesh Taka Tk</option>
                                <option value="BBD">Barbados Dollars $</option>
                                <option value="BMD">Bermuda Dollars $</option>
                                <option value="BRL">Brazil Reais R$</option>
                                <option value="BGN">Bulgaria Leva лв</option>
                                <option value="CAD">Canada Dollars $</option>
                                <option value="XOF">CFA Francs BCEAO CFAF</option>
                                <option value="XAF">CFA Francs BEAC CFAF</option>
                                <option value="XPF">CFP Francs </option>
                                <option value="CLP">Chile Pesos $</option>
                                <option value="CNY">China Yuan Renminbi 元</option>
                                <option value="COP">Colombia Pesos $</option>
                                <option value="CRC">Costa Rica Colones ₡</option>
                                <option value="HRK">Croatia Kuna kn</option>
                                <option value="CYP">Cyprus Pounds £</option>
                                <option value="CZK">Czech Republic Koruny Kč</option>
                                <option value="DKK">Denmark Kroner kr</option>
                                <option value="DOP">Dominican Republic Pesos RD$</option>
                                <option value="XCD">East Caribbean Dollars $</option>
                                <option value="EGP">Egypt Pounds £</option>
                                <option value="EEK">Estonia Krooni kr</option>
                                <option value="FJD">Fiji Dollars $</option>
                                <option value="HKD">Hong Kong Dollars 元</option>
                                <option value="HUF">Hungary Forint Ft</option>
                                <option value="ISK">Iceland Kronur kr</option>
                                <option value="XDR">IMF Special Drawing Rights </option>
                                <option value="INR">India Rupees ₨</option>
                                <option value="IDR">Indonesia Rupiahs Rp</option>
                                <option value="IRR">Iran Rials ﷼</option>
                                <option value="IQD">Iraq Dinars ID</option>
                                <option value="ILS">Israel New Shekels ₪</option>
                                <option value="JMD">Jamaica Dollars J$</option>
                                <option value="JOD">Jordan Dinars JD</option>
                                <option value="KZT">Kazakhstan Tenge лв</option>
                                <option value="KES">Kenya Shillings K Sh</option>
                                <option value="KWD">Kuwait Dinars KD</option>
                                <option value="LBP">Lebanon Pounds £</option>
                                <option value="MYR">Malaysia Ringgits RM</option>
                                <option value="MTL">Malta Liri Lm</option>
                                <option value="MUR">Mauritius Rupees ₨</option>
                                <option value="MXN">Mexico Pesos $</option>
                                <option value="MAD">Morocco Dirhams DH</option>
                                <option value="NZD">New Zealand Dollars $</option>
                                <option value="NGN">Nigeria Nairas ₦</option>
                                <option value="NOK">Norway Kroner kr</option>
                                <option value="OMR">Oman Rials ﷼</option>
                                <option value="PKR">Pakistan Rupees ₨</option>
                                <option value="XPD">Palladium Ounces </option>
                                <option value="PEN">Peru Nuevos Soles S/.</option>
                                <option value="PHP">Philippines Pesos Php</option>
                                <option value="PLN">Poland Zlotych zł</option>
                                <option value="QAR">Qatar Riyals ﷼</option>
                                <option value="RON">Romania New Lei lei</option>
                                <option value="RUB">Russia Rubles руб</option>
                                <option value="SAR">Saudi Arabia Riyals ﷼</option>
                                <option value="XAG">Silver Ounces </option>
                                <option value="SGD">Singapore Dollars $</option>
                                <option value="ZAR">South Africa Rand R</option>
                                <option value="KRW">South Korea Won ₩</option>
                                <option value="LKR">Sri Lanka Rupees ₨</option>
                                <option value="SDG">Sudan Pounds </option>
                                <option value="SEK">Sweden Kronor kr</option>
                                <option value="CHF">Switzerland Francs CHF</option>
                                <option value="TWD">Taiwan New Dollars NT$</option>
                                <option value="THB">Thailand Baht ฿</option>
                                <option value="TTD">Trinidad and Tobago Dollars TT$</option>
                                <option value="TND">Tunisia Dinars TD</option>
                                <option value="TRY">Turkey Lira YTL</option>
                                <option value="AED">United Arab Emirates Dirhams Dh</option>
                                <option value="VEF">Venezuela Bolivares Fuertes </option>
                                <option value="VND">Vietnam Dong ₫</option>
                                <option value="ZMK">Zambia Kwacha ZK</option>
                            </select>
                          </div>
                        </div>
                        
                        <!-- Text input-->
                        <div class="form-group">
                          <label class="col-md-2 control-label" for="amount">Amount</label>  
                          <div class="col-md-10">
                          <input id="amount" name="amount" placeholder="" class="form-control input-md" type="text">
                            
                          </div>
                        </div>
                        
                        <!-- Button (Double) -->
                        <div class="form-group">
                          <div class="col-md-12">
                            <button id="convert" name="convert" class="btn btn-success">Convert</button>
                            <button id="clear" name="clear" class="btn btn-danger">Clear</button>
                          </div>
                        </div>
                        
                        </fieldset>
                	</form>
                </div>
                <img style="display:none;margin-bottom:20px;" src="img/loader.gif" alt="loader"/>
                <div class="well well-sm out_div" style="display:none;">
                	<p><strong><span class="from_c" style="color:#00FF40;">1</span>&nbsp;<span class="from_c_code">USD</span>&nbsp;= <span class="to_c" style="color:#00FF40;">1</span>&nbsp;<span class="to_c_code">BDT</span> &nbsp;&nbsp;Conversion&nbsp;Rate:&nbsp;<span class="from_con_c" style="color:#6600CC;">10</span>&nbsp;<span class="from_con_c_code">USD</span>&nbsp;=&nbsp;<span class="to_con_c" style="color:#6600CC;">1</span>&nbsp;<span class="to_con_c_code">BDT</span></strong></p>
                </div>
            </div>
        </div>
        
    

<script src="<?php echo $plug_fl; ?>js/jquery.min.js"></script>
<script src="<?php echo $plug_fl; ?>js/currency_converter.js"></script>
<script src="<?php echo $plug_fl; ?>js/common.js"></script>

