<!DOCTYPE html>
<html lang="en">

    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
        <title>Taylor's POS System</title>
        <meta http-equiv="Cache-Control" content="no-cache, no-store, must-revalidate" />
        <meta http-equiv="Pragma" content="no-cache" />
        <meta http-equiv="Expires" content="0" />
        <link rel="stylesheet" media="screen" href="/css/bootstrap.css">
        <link rel="stylesheet" media="screen" href="/css/style.css">
        <script src="//netdna.bootstrapcdn.com/bootstrap/3.0.0/js/bootstrap.min.js"></script>
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
                    <h4>Customer Information</h4>
                    <p>Prompt for customer information here. Also able to pull info from a database.</p>
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
                                <br />
                                <br />
                                <div class="addsku-button">
                                    <input id="submit-sku" type="button" onclick="addSku()" value="Add SKU">
                                    <br>
                                </div>
                            </form>
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
                    <?php echo date( "Y"); ?>Taylor Thurlow.</div>
                <div class="visible-sm">
                    <a href="" class="hiddenLink">&copy;</a>
                    <?php echo date( "Y"); ?>Taylor Thurlow. Chrome and Firefox only.</div>
                <div class="visible-md visible-lg">
                    <a href="" class="hiddenLink">&copy;</a>
                    <?php echo date( "Y"); ?>Taylor Thurlow. Supported on Chrome and Firefox only.</div>
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
