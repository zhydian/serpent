<div class="toolbench">
    <div class="toolbar">
        <?php if($permission->canCreateCasino($casino['id'])){ ?>
        <div id="createCasinoBtn" class="button-body tool-button" data-toggle="tooltip" title="Create New Property">
            <span class="glyphicon glyphicon-home tool-glyphicon white" aria-hidden="true"></span>
        </div>
        <?php } ?>
        <div class="button-body tool-button" data-toggle="tooltip" title="Add New User">
            <span class="glyphicon glyphicon-user tool-glyphicon white" aria-hidden="true"></span>
        </div>
        <div class="button-body tool-button" data-toggle="tooltip" title="Options">
            <span class="glyphicon glyphicon-cog tool-glyphicon white" aria-hidden="true"></span>
        </div>
        <div class="button-body tool-button" data-toggle="tooltip" title="Request Help">
            <span class="glyphicon glyphicon-comment tool-glyphicon white" aria-hidden="true"></span>
        </div>
        <div class="button-body tool-button" data-toggle="tooltip" title="Add New User">
            <span class="glyphicon glyphicon-user tool-glyphicon white" aria-hidden="true"></span>
        </div>
    </div>
</div>