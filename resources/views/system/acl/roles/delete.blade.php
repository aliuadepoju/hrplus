<div class="col-md-12">
	<section class="panel">
        <header class="panel-heading"> Confirm Deletion <i class="fa fa-info-sign text-muted" data-toggle="tooltip" data-placement="bottom" data-title="ajax to load the data."></i> 
        </header>
        <div class="panel-body">
       
            <h4 align="justify">Are you sure you want to delete <strong>{{$role->name}}</strong> from the system roles. Hence you are been warned. This action is not revocable and it is logged against your user account. Do you want to proceed with this operation? </h4>
            <div class="" align="center">
            	@role('hr-admin | administrator')
                    <button class="btn btn-xs btn-primary" type="button" data-toggle="collapse" > <i class="fa fa-trash-o"> </i> Yes</button>
                    <button class="btn btn-xs btn-danger" type="button" data-toggle="collapse" > <i class="fa fa-times"> </i> Cancel</button>
                @endrole
            </div>
        </div>
    </section>
</div>