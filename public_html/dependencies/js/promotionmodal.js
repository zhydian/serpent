var promotionViewModal = $("#promotion-view-modal").dialog({
    autoOpen: false,
    height: 620,
    width: 600,
    modal: true,
    cache: false,
    buttons: {
        Update: function () {
            updatePromotion($("#promotion-view-modal").data('promo-id'));
            $("#promotion-view-modal").dialog('close');
          }
        }
    });
