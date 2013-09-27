<!DOCTYPE html>
<html lang="en">

    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
        <title>Taylor's POS System</title>
        <meta http-equiv="Cache-Control" content="no-cache, no-store, must-revalidate" />
        <meta http-equiv="Pragma" content="no-cache" />
        <meta http-equiv="Expires" content="0" />
        <link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css">
        <link rel="stylesheet" media="screen" href="/css/style.css">
        <script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
    </head>

    <body class="body">
        <div class="container">
            <div class="row">
                <div class="col-sm-0 col-md-3"></div>
                <div class="col-sm-12 col-md-6 pos-header">Point-of-Sale System</div>
            </div>
            <div class="row pos-bar">
                <div class="col-md-12">
                    <div id="curTran" class="curTran"></div>
                    <div class="insertSku">
                        <input type="text" pattern="[0-9]*" id="inSku" name="inSku" placeholder="SKU/UPC" style="direction: rtl;" size="20" maxlength="7">
                    </div>
                </div>
            </div>
            <div class="row pos-secondary">
                <div class="col-md-12 pos-overlay">
                    <div class="row">
                        <div class="col-md-4">
                            <h4 class="center" style="padding-bottom: 10px;">Add New Customer</h4>
                            <form id="addCustomer" name="addCustomer">
                                <label class="addCustomer-label">First Name:</label>
                                <input class="addCustomer-input" type="text" id="addCustomer-firstName">
                                <label class="addCustomer-label">Last Name:</label>
                                <input class="addCustomer-input" type="text" id="addCustomer-lastName">
                                <label class="addCustomer-label">Address:</label>
                                <input class="addCustomer-input" type="text" id="addCustomer-address">
                                <label class="addCustomer-label">City:</label>
                                <input class="addCustomer-input" type="text" id="addCustomer-city">
                                <label class="addCustomer-label">State:</label>
                                <input class="addCustomer-input" type="text" id="addCustomer-state">
                                <label class="addCustomer-label">Zip:</label>
                                <input class="addCustomer-input" type="text" id="addCustomer-zip">
                                <label class="addCustomer-label">Phone 1:</label>
                                <input class="addCustomer-input" type="text" id="addCustomer-phone1">
                                <label class="addCustomer-label">Phone 2:</label>
                                <input class="addCustomer-input" type="text" id="addCustomer-phone2">
                                <div class="row">
                                    <div class="newCustomer-button center span12">
                                        <input id="submitNewCustomer" type="button" onclick="addCustomer()" value="Add">
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="col-md-8">
                            <div class="" style="padding: 10px;">Ea ita amet laborum hic offendit quid nescius commodo ea fugiat cupidatat possumus, nisi aliquip o culpa illum aut quid est litteris ita quorum non ex illum mandaremus reprehenderit de aute ea ullamco quo eram a aute ut vidisse. Admodum an arbitror, mandaremus tamen labore mentitum enim. Fugiat et cernantur, iis sint ullamco arbitror. Quorum o in sunt cernantur e tamen qui deserunt eu sed noster summis sunt proident, iis nam voluptatibus iis o irure quo elit aut eu culpa cernantur, nostrud graviterque si proident ubi arbitror ne sint voluptate. Sed tempor de aliquip o hic cillum occaecat eruditionem ea ea quorum quorum si probant et incididunt in enim. Ullamco multos minim hic noster, quorum praetermissum quibusdam fore arbitror ita offendit eram ne senserit philosophari, pariatur do quis. Si duis se quorum quo labore excepteur est senserit, ita aliqua instituendarum et ea o coniunctione ad nulla incididunt do aute nisi, cupidatat sunt summis appellat enim se magna senserit ullamco, lorem expetendis exquisitaque. Ut quae dolore de iudicem.</div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row pos-main">
                <div class="col-md-4 pos-sidebar">
                    <div id="pos-add-sku" class="row">
                        <div class="col-md-12">
                            <form id="addsku" name="addsku">
                                <label class="addsku-label">New SKU:</label>
                                <input class="addsku-input" type="text" id="sub-sku">
                                <label class="addsku-label">Short Name:</label>
                                <input class="addsku-input" type="text" id="sub-nameshort">
                                <label class="addsku-label">Long Name:</label>
                                <input class="addsku-input" type="text" id="sub-namelong">
                                <label class="addsku-label">Full Price:</label>
                                <input class="addsku-input" type="text" id="sub-pricefull">
                                <label class="addsku-label">Sale Price:</label>
                                <input class="addsku-input" type="text" id="sub-pricesale">
                                <label class="addsku-label">Tax (1 or 0):</label>
                                <input class="addsku-input" type="text" id="sub-tax">
                                <!--- <br />
                                <br />
                                <div class="addsku-button">
                                    <input id="submit-sku" type="button" onclick="addSku()" value="Add SKU">
                                    <br>
                                </div>---></form>
                        </div>
                    </div>
                </div>
                <div id="pos-product-list" class="col-md-8 pos-product-list"></div>
                <br class="clear" />
            </div>
            <div class="row pos-buttons">
                <div class="col-sm-4 col-md-2 pos-button" onclick="window.location.reload()">New Transaction</div>
                <div class="col-sm-4 col-md-2 pos-button" onclick="popup()">Customer Info</div>
                <div class="col-sm-4 col-md-2 pos-button" onclick="">Something</div>
                <div class="col-sm-4 col-md-2 pos-button" onclick="">Something</div>
                <div class="col-sm-4 col-md-2 pos-button" onclick="">Something</div>
                <div class="col-sm-4 col-md-2 pos-button" onclick="">Something</div>
            </div>
            <div class="row pos-footer">
                <div class="visible-xs">
                    <a href="" class="hiddenLink">&copy;</a>
                    <?php echo date( "Y"); ?>- Taylor Thurlow</div>
                <div class="visible-sm">
                    <a href="" class="hiddenLink">&copy;</a>
                    <?php echo date( "Y"); ?>- Taylor Thurlow. Chrome and Firefox only.</div>
                <div class="visible-md visible-lg">
                    <a href="" class="hiddenLink">&copy;</a>
                    <?php echo date( "Y"); ?>- Taylor Thurlow. Supported on Chrome and Firefox only.</div>
                <span class="visible-xs">xsmall</span>
                <span class="visible-sm">small</span>
                <span class="visible-md">med</span>
                <span class="visible-lg">large</span>
            </div>
        </div>
    </body>
    <script type="text/javascript" src="/js/spin.js"></script>
    <script type="text/javascript" src="/js/scripts.js"></script>
    <script type="text/javascript" src="/js/jquery.hotkeys.js"></script>
    <script type="text/javascript">
        $(function() {
            startNewTrans();
        });
    </script>

</html>
