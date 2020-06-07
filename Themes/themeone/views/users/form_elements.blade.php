

					 <fieldset class="form-group">



						{{ Form::label('name', getphrase('name')) }}

						<span class="text-red">*</span>

						{{ Form::text('name', $value = null , $attributes = array('class'=>'form-control', 'placeholder' => 'Jack',

							'ng-model'=>'name',

							'required'=> 'true',

							'ng-pattern' => getRegexPattern("name"),

							'ng-minlength' => '2',

							'ng-maxlength' => '20',

							'ng-class'=>'{"has-error": formUsers.name.$touched && formUsers.name.$invalid}',



						)) }}

						<div class="validation-error" ng-messages="formUsers.name.$error" >

	    					{!! getValidationMessage()!!}

	    					{!! getValidationMessage('minlength')!!}

	    					{!! getValidationMessage('maxlength')!!}

	    					{!! getValidationMessage('pattern')!!}

						</div>

					</fieldset>



					<?php

					$readonly = '';

					$username_value = null;

					if($record){

						$readonly = 'readonly="true"';

						// $username_value = $record->username;

					}



					?>

					 <fieldset class="form-group">



						{{ Form::label('username', getphrase('username')) }}

						<span class="text-red">*</span>

						{{ Form::text('username', $value = $username_value , $attributes = array('class'=>'form-control', 'placeholder' => 'Jack',

							'ng-model'=>'username',

							'required'=> 'true',

							 $readonly,



							'ng-minlength' => '2',

							'ng-maxlength' => '20',

							'ng-class'=>'{"has-error": formUsers.username.$touched && formUsers.username.$invalid}',



						)) }}

						<div class="validation-error" ng-messages="formUsers.username.$error" >

	    					{!! getValidationMessage()!!}

	    					{!! getValidationMessage('minlength')!!}

	    					{!! getValidationMessage('maxlength')!!}

	    					{!! getValidationMessage('pattern')!!}

						</div>

					</fieldset>

					@if($record)
					 <fieldset class="form-group">

						<?php $password_required = true;
						if($record)
							$password_required = false;
						?>

						{{ Form::label('password', getphrase('password')) }}
						@if(!$record)

						<span class="text-red">*</span>
						@endif

						{{ Form::password('password', $attributes = array('class'=>'form-control', 'placeholder' => 'Enter password',

							'ng-model'=>'password',

							'required'=> $password_required,

							'ng-minlength' => '2',

							'ng-maxlength' => '20',

							'ng-class'=>'{"has-error": formUsers.password.$touched && formUsers.password.$invalid}',



						)) }}

						<div class="validation-error" ng-messages="formUsers.password.$error" >

	    					{!! getValidationMessage()!!}

	    					{!! getValidationMessage('minlength')!!}

	    					{!! getValidationMessage('maxlength')!!}


						</div>

					</fieldset>
					@endif

					 <fieldset class="form-group">

						<?php

						$readonly = '';

							if(!checkRole(getUserGrade(4)))

							$readonly = 'readonly="true"';

						if($record)

						{

							$readonly = 'readonly="true"';

						}



						?>

						{{ Form::label('email', getphrase('email')) }}

						<span class="text-red">*</span>

						{{ Form::email('email', $value = null, $attributes = array('class'=>'form-control', 'placeholder' => 'jack@jarvis.com',

							'ng-model'=>'email',

							'required'=> 'true',

							'ng-class'=>'{"has-error": formUsers.email.$touched && formUsers.email.$invalid}',

						 $readonly)) }}

						 <div class="validation-error" ng-messages="formUsers.email.$error" >

	    					{!! getValidationMessage()!!}

	    					{!! getValidationMessage('email')!!}

						</div>

					</fieldset>

					@if(!$record)
					 <fieldset class="form-group">
					 {{ Form::label('password', getphrase('password')) }}

						<span class="text-red">*</span>

						{{ Form::password('password', $attributes = array('class'=>'form-control instruction-call',

								'placeholder' => getPhrase("password"),

								'ng-model'=>'password',

								'required'=> 'true',

								'ng-class'=>'{"has-error": formUsers.password.$touched && formUsers.password.$invalid}',

								'ng-minlength' => 5

							)) }}

						<div class="validation-error" ng-messages="formUsers.password.$error" >

							{!! getValidationMessage()!!}

							{!! getValidationMessage('password')!!}

						</div>


					</fieldset>

					 <fieldset class="form-group">
					 {{ Form::label('confirm_password', getphrase('confirm_password')) }}

						<span class="text-red">*</span>

						{{ Form::password('password_confirmation', $attributes = array('class'=>'form-control instruction-call',

								'placeholder' => getPhrase("confirm_password"),

								'ng-model'=>'password_confirmation',

								'required'=> 'true',

								'ng-class'=>'{"has-error": formUsers.password_confirmation.$touched && formUsers.password.$invalid}',

								'ng-minlength' => 5

							)) }}

						<div class="validation-error" ng-messages="formUsers.password_confirmation.$error" >

							{!! getValidationMessage()!!}

							{!! getValidationMessage('password')!!}

						</div>


					</fieldset>

                  @endif





					@if(!checkRole(['parent']))

					<fieldset class="form-group">



						{{ Form::label('role', getphrase('role')) }}

						<span class="text-red">*</span>

						<?php $disabled = (checkRole(getUserGrade(1))) ? '' :'disabled';


						if(checkRole(getUserGrade(2)))
							$selected = getRoleData('teacher');
						else
							$selected = getRoleData('student');

						if($record)

							$selected = $record->role_id;

						?>

						{{Form::select('role_id', $roles, $selected, ['placeholder' => getPhrase('select_role'),'class'=>'form-control', $disabled,

							'ng-model'=>'role_id',

							'value' => $selected,

							'required'=> 'true',

							'ng-class'=>'{"has-error": formUsers.role_id.$touched && formUsers.role_id.$invalid}'

						 ])}}

						  <div class="validation-error" ng-messages="formUsers.role_id.$error" >

	    					{!! getValidationMessage()!!}



						</div>



					</fieldset>

					@endif

					@if((checkRole(getUserGrade(2))))
					
					
					@if(checkRole(['teacher']))

					<fieldset class="form-group">



						{{ Form::label('Section', 'Assign as Class teacher (Optional)') }}

						<span class="text-red"></span>

						{{ Form::text('section', $value = null , $attributes = array('class'=>'form-control', 'placeholder' => 'Section name',

							'ng-model'=>'section',

							'list'=>'section-list',

							'ng-minlength' => '2',

							'ng-maxlength' => '20'



						)) }}

						<datalist id="section-list">
							@foreach($sections as $section)
								<option value="{{ $section }}"/>
							@endforeach
						</datalist>

						<div class="validation-error" ng-messages="formUsers.name.$error" >
						</fieldset>

						@endif

						@if(checkRole(['teacher']))

						<fieldset class="form-group">

						{{ Form::label('parent', getphrase('parent')) }}

						<span class="text-red">*</span>

						<?php



						
						if($record)

							$selected = $record->parent_id;

						?>

						{{Form::select('parent_id', $parents, $selected, ['placeholder' => getPhrase('select_parent'),'class'=>'form-control',

							'ng-model'=>'parent_id',

							'required'=> 'true',

							'ng-class'=>'{"has-error": formUsers.parent_id.$touched && formUsers.parent_id.$invalid}'

						 ])}}

						  <div class="validation-error" ng-messages="formUsers.parent_id.$error" >

	    					{!! getValidationMessage()!!}



						</div>



					</fieldset>

					@endif



					<fieldset class="form-group">



						{{ Form::label('phone', getphrase('phone')) }}

						<span class="text-red">*</span>

						{{ Form::text('phone', $value = null , $attributes = array('class'=>'form-control', 'placeholder' =>
						getPhrase('please_enter_10_digit_mobile_number'),

							'ng-model'=>'phone',

							'required'=> 'true',

							'ng-pattern' => getRegexPattern("phone"),

							'ng-class'=>'{"has-error": formUsers.phone.$touched && formUsers.phone.$invalid}',


						)) }}



						<div class="validation-error" ng-messages="formUsers.phone.$error" >

	    					{!! getValidationMessage()!!}

	    					{!! getValidationMessage('phone')!!}

	    					{!! getValidationMessage('maxlength')!!}

						</div>

					</fieldset>

						<?php $role=getRole();?>
					@if($role=!'owner' and $role=!'parent')
					<fieldset class="form-group">



						{{ Form::label('Institution', getphrase('Institution Name')) }}

						<span class="text-red">*</span>

						{{ Form::text('inst_name', $value = null , $attributes = array('class'=>'form-control',

							'placeholder' => getPhrase("Institution"),

							'ng-model'=>'inst_name',

							'ng-pattern' => getRegexPattern('name'),

							'required'=> 'true', 

							'ng-class'=>'{"has-error": registrationForm.inst_name.$touched && registrationForm.inst_name.$invalid}',

							'ng-minlength' => '2',

						)) }}

							<div class="validation-error" ng-messages="registrationForm.inst_name.$error" >

								{!! getValidationMessage()!!}

								{!! getValidationMessage('minlength')!!}

								{!! getValidationMessage('pattern')!!}

							</div>

					</fieldset>
						<fieldset class="form-group">



						{{ Form::label('department', getphrase('Department Name')) }}

						<span class="text-red">*</span>

						{{ Form::text('department', $value = null , $attributes = array('class'=>'form-control',

							'placeholder' => getPhrase("Department"),

							'ng-model'=>'department',

							'ng-pattern' => getRegexPattern('name'),

							'required'=> 'true', 

							'ng-class'=>'{"has-error": registrationForm.department.$touched && registrationForm.department.$invalid}',

							'ng-minlength' => '4',

						)) }}

							<div class="validation-error" ng-messages="registrationForm.department.$error" >

								{!! getValidationMessage()!!}

								{!! getValidationMessage('minlength')!!}

								{!! getValidationMessage('pattern')!!}

							</div>

					</fieldset>
					@endif
							
							


					<div class="row">

						<fieldset class="form-group col-sm-6">


							@if(checkRole(['owner'])or checkRole(['admin']))

								{{ Form::label('address', getphrase('address')) }}
							@else
								{{ Form::label('address', getphrase('student_address')) }}
							@endif

						{{ Form::textarea('address', $value = null , $attributes = array('class'=>'form-control','rows'=>3, 'cols'=>'15', 'placeholder' => getPhrase('please_enter_your_address'),

							'ng-model'=>'address',

							)) }}

					</fieldset>


					<fieldset class='col-sm-6'>

						{{ Form::label('image', getphrase('image')) }}

						<div class="form-group row">

							<div class="col-md-6">



					{!! Form::file('image', array('id'=>'image_input', 'accept'=>'.png,.jpg,.jpeg')) !!}

							</div>

							<?php if(isset($record) && $record) {

								  if($record->image!='') {

								?>

							<div class="col-md-6">

								<img src="{{ getProfilePath($record->image) }}" />



							</div>

							<?php } } ?>

						</div>

					</fieldset>

					  </div>



						<div class="buttons text-center">

							<button class="btn btn-lg btn-success button"

							ng-disabled='!formUsers.$valid'>{{ $button_name }}</button>

						</div>