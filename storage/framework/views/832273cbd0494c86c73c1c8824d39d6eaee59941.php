<?php $__env->startSection('content'); ?>
<?php $__env->startSection('titel','patient'); ?>
<div class="content">
    <div class="row">
      
<script>
function toggleDetail() {
  $('#toggle-btn').toggleClass('open');
  $('#toggle-detail').fadeToggle();
}
</script>
      
      <div class="text-center">
      <?php if(Session::has('message')): ?>
        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a><p class="alert <?php echo e(Session::get('alert-class', 'alert-info')); ?>"><?php echo e(Session::get('message')); ?></p>
      <?php endif; ?>
        <div class="btn btn-primary btn-fill btn-wd" id="toggle-btn" onclick="toggleDetail()">Add Patient</div>
      </div><br>
      <div class="col-lg-12 col-md-12" id="toggle-detail" style="display:none;">
          <div class="card">
              <div class="header">
                  <h4 class="title">create patient</h4>
              </div>
              <div class="content">
                  <form action="<?php echo e(url ('patient')); ?>" method="POST" enctype="multipart/form-data" >
                    <?php echo csrf_field(); ?>

                      <div class="row">
                          <div class="col-md-5">
                              <div class="form-group">
                                  <label>Name</label>
                                  <input type="text" name="patient_name"class="form-control border-input" placeholder="name">
                              </div>
                          </div>
                          <div class="col-md-2">
                              <div class="form-group">
                                  <label>Gender</label>
                                  <select name="patient_gender" class="form-control border-input">
                                    <option selected></option>
                                    <option value="Male">Male</option>
                                    <option value="Female">Female</option>
                                  </select>
                                </div>
                          </div>
                          <div class="col-md-3">
                              <div class="form-group">
                                  <label for="exampleInputPhone">Phone</label>
                                  <input type="number" name="patient_phone" class="form-control border-input" placeholder="phone">
                              </div>
                          </div>
                          <div class="col-md-2">
                              <div class="form-group">
                                  <label>Blood Group</label>
                                  <select name="patient_blood" class="form-control border-input">
                                    <option selected></option>
                                    <option value="O−">O−</option>
                                    <option value="O+">O+</option>
                                    <option value="A−">A−</option>
                                    <option value="A+">A+</option>
                                    <option value="B−">B−</option>
                                    <option value="B+">B+</option>
                                    <option value="AB−">AB−</option>
                                    <option value="AB+">AB+</option>
                                  </select>
                                </div>
                          </div>
                      </div>

                      <div class="row">
                        <div class="col-md-8">
                            <div class="form-group">
                                <label>Address</label>
                                <input type="text" name="patient_address" class="form-control border-input" placeholder="Home Address">
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <label>Birthday</label>
                                <input type="date" name="patient_birthday" class="form-control border-input">
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <label>categorie</label>
                                <select name="categorie_id" class="form-control border-input" required>
                                  <!-- <option selected disabled="true">-- select --</option> -->
                                  <?php $categories = App\Categorie::all(); ?>
                                  <?php foreach ($categories as $value): ?>
                                    <option value="<?php echo e($value->id); ?>"><?php echo e($value->categorie_name); ?></option>
                                  <?php endforeach; ?>
                                </select>
                              </div>
                        </div>
                      </div>

                      <div class="row">
                          <div class="col-md-12">
                              <div class="form-group">
                                  <label>Chronic Diseases</label>
                                  <textarea rows="5" name="patient_diseases" class="form-control border-input" placeholder="Description"></textarea>
                              </div>
                          </div>
                      </div>
                      <div class="text-center">
                          <button type="submit" class="btn btn-info btn-fill btn-wd">Add</button>
                      </div>
                      <div class="clearfix"></div>
                  </form>
              </div>
          </div>
      </div>
      
      <div class="col-lg-12 col-md-12" id="toggle-detail">
          <div class="card">
          <div class="header">
            <h4 class="title">patients</h4>
          </div>
          <div class="content">
            <div class="input-group col-md-12">
      		      <input type="search" class="light-table-filter" data-table="members_details" placeholder="Quick Filter">
            </div>
      		  <table class="members_details">
        			<thead>
        				<tr>
        					<th class="patient_name text_align_center"><b>Name</b></th>
        					<th class="patient_gender text_align_center"><b>Gender</b></th>
        					<th class="patient_phone text_align_center"><b>Phone</b></th>
                  <th class="patient_birthday text_align_center"><b>Birthday</b></th>
                  <th class="delete text_align_center"><b>Delete</b></th>
        				</tr>
        			</thead>
        			<tbody>

                <?php $__currentLoopData = $patients; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $patient): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
        			<tr>
        				<td class="patient_name"><a href="<?php echo e(url ('patient/'.$patient->id)); ?>" class="" ><?php echo e($patient->patient_name); ?></a></td>
                <td class="patient_gender"><?php echo e($patient->patient_gender); ?></td>
        				<td class="patient_phone text_align_center"><?php echo e($patient->patient_phone); ?></td>
        				<td class="patient_birthday"><?php echo e($patient->patient_birthday); ?></td>
                <td class="delete">
                  <?php echo e(Form::open(array(
                      'route' => array( 'patient.destroy', $patient->id ),
                      'method' => 'delete',
                      'style' => 'display:inline',
                      'onsubmit' => "return confirm('Do you really want to delete the patient and related activities with it?')",
                  ))); ?>

                       <?php echo e(Form::submit('Delete', array('class' => 'btn btn-danger'))); ?>

                  <?php echo e(Form::close()); ?>

                </td>
        			</tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
        		</tbody>
      		</table>
        </div>
    </div>
  </div>

</div>
</div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>