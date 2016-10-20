
<div id="promotion-list">
    <h2 class="casino-title"><?php echo $casino['name'];?></h2>
    <!--New Promotion Title-->
    <?php
    if($permission->canCreateAPromotionInACasino($casino['id'])){?>
    <div class="add-promotion-btn tile-body tile-insert">
        <img class="tile-icon" src="dependencies/images/clear.png">
        <div class="glyphicon-new-container">
            <span class="glyphicon glyphicon-plus-sign glyphicon-new-tile white" aria-hidden="true"></span>
        </div>
    </div>
    <!--End New Promotion Tile-->
    <!--Promotion Title-->
    <?php
  }
    $promotionList = $promotion->getAllPromotionsByCasino($casino['id']);
    if(count($promotionList)>0){
        foreach($promotionList as $row){
          include 'views/promotionView.php';
        }
      }?>
    <!--End Promotion Tile-->
</div>