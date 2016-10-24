<?php
/*
* Footer
* Author: Stephen King
* Version 2016.10.5.1
*
* This page controls the footer and closing material for the website
*/
?>   <script>   $(document).ready(function() {
        var perm =
            <?php if($permission->canDeleteCasinoPromotion($casino['id'])){
                            echo true;
                    } else {
                        echo false;} ?> ;
        //Load tooltips
        $(document).ready(function () {
            $('[data-toggle="tooltip"]').tooltip();
        });
        //Show option bar
        $(".tile-body").hover(function () {
            $(this).children(".tile-menu-bar").removeClass("hidden");
        }, function () {
            $(this).children(".tile-menu-bar").addClass("hidden");

        });
        //highlight option under mouse
        $(".tile-menu-item").hover(function () {
            $(this).addClass("tile-menu-item-hover");
        }, function () {
            $(this).removeClass("tile-menu-item-hover");

        });
        $("#createCasinoBtn").click(function () {
            createCasinoModal.dialog('open');
        });

        $(".add-promotion-btn").unbind('click').click(function () {
            $('input[name=casinoId]').val(this.id);
            addPromotionModal.dialog('open');
        });

        //Open add/remove user panel
        $(".userBtn").unbind('click').click(function () {
            editUsersModal.dialog('open');
        });

        $(".settingsBtn").unbind('click').click(function() {
            getSettings($(this).attr('id'), perm);
        });

        /*
         These are the modal windows that can be opened. Note that these need
         to be moved to their own file. Most likely they should just be aggregated
         as they are 90% similar.
         */

        var editUsersModal = $("#editUsers").dialog({
            autoOpen: false,
            height: 400,
            width: 350,
            modal: true,
            buttons: {
                Submit: function () {
                    //submit changes to db through options modal class
                    editUsers.dialog('close');
                }
            }
        });

        //Adds a new tile to the view with the image that is passed into the function
        var addPromotion = function (image, casinoId) {
            $('#promotion-list-' + casinoId).append(
                '<div class="tile-body">' +
                '<img class="tile-icon" src="dependencies/images/' + image + '">' +
                '<div class="tile-menu-bar hidden">' +
                '<div class="tile-menu-item settingsBtn">' +
                '<span class="glyphicon glyphicon-cog glyphicon-menu black" aria-hidden="true"></span>' +
                '</div>' +
                '<div class="tile-menu-item">' +
                '<span class="glyphicon glyphicon-pause glyphicon-menu black" aria-hidden="true"></span>' +
                '</div>' +
                '<div class="tile-menu-item">' +
                '<span class="glyphicon glyphicon-user glyphicon-menu black" aria-hidden="true"></span>' +
                '</div>' +
                '</div>' +
                '</div>'
            );
        };


        var addPromotionModal = $("#addPromotion").dialog({
            autoOpen: false,
            height: 400,
            width: 350,
            modal: true,
            buttons: {
                Submit: function () {
                    var promotionId = $('select[name=promoId]').val();
                    var casinoId = $('input[name=casinoId]').val();
                    //Ajax call to update database with new promotion
                    $.ajax({
                        url: 'controllers/addPromotion.php',
                        type: 'post',
                        data: {casinoId: casinoId, promotionId: promotionId},
                        cache: false,
                        success: function (response) {
                            console.log(response);

                            //update view with new promotion
                            addPromotion(response.image, casinoId);
                            addPromotionModal.dialog('close');
                        },
                        error: function (xhr, desc, err) {
                            console.log(xhr + "\n" + err);
                        }
                    });
                }
            }
        });

        var createCasinoModal = $('#createCasino').dialog({
            autoOpen: false,
            height: 570,
            width: 350,
            modal: true,
            buttons: {
                Submit: function () {
                    createCasino();
                    createCasinoModal.dialog('close');
                }
            }
        });

        var createCasino = function () {
            var casinoName = $('#casinoName').val();
            var parentCompany = $('#parentCompany').val();
            var assetBundleUrl = $('#assetBundleUrl').val();
            var assetBundleWindows = $('#assetBundleWindows').val();
            var assetName = $('#assetName').val();
            var defaultSkin = $('#defaultSkin').val();
            var defaultLogo = $('#defaultLogo').val();
            var supportGroup = $('#supportGroup').val();
            var businessOpen = $('#businessHoursOpen').val();
            var businessClose = $('#businessHoursClose').val();

            $.ajax({
                url: '../public_html/controllers/toolBarController.php',
                type: 'post',
                data: {
                    casinoName: casinoName, parentCompany: parentCompany, assetBundleUrl: assetBundleUrl,
                    assetBundleWindows: assetBundleWindows, assetName: assetName, defaultSkin: defaultSkin,
                    defaultLogo: defaultLogo, supportGroup: supportGroup, businessOpen: businessOpen,
                    businessClose: businessClose
                },
                cache: false,
                success: function (json) {
                    var result = JSON.parse(json);
                    if (result.error === 'none') {
                        alert("Casino Created!");
                    } else {
                        alert("Error creating casino");
                    }
                },
                error: function () {
                    alert("An error occurred!")
                }
            })
        };
    });

</script>
</html>