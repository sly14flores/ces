angular.module('students-module',['bootstrap-modal']).factory('form', function($compile,$timeout,$http,bootstrapModal) {
	
	function form() {
		
		var self = this;
		
		self.data = function(scope) { // initialize data

			scope.formHolder = {};		

			scope.student_info = {};
			scope.student_info.id_number = 0;

			scope.academic_info = {};
			scope.academic_info.id_number = 0;
			
			scope.parental_info = {};
			scope.parental_info.id_number = 0;			

			scope.students = []; // list			

		};

		function validate(scope) {
			
			var controls = scope.formHolder.personalform.$$controls;
			
			angular.forEach(controls,function(elem,i) {
				
				if (elem.$$attr.$attr.required) elem.$touched = elem.$invalid;
									
			});

			return scope.formHolder.personalform.$invalid;
			
		};

		self.student = function(scope,row) {						
			
			$('#x_content').html('Loading...');
			$('#x_content').load('forms/student.html',function() {
				$timeout(function() { $compile($('#x_content')[0])(scope); },100);				
			});
			
			if (row != null) {
				if (scope.$id > 2) scope = scope.$parent;				
				$http({
				  method: 'POST',
				  url: 'handlers/student-edit.php',
				  data: {id_number: row.id_number}
				}).then(function mySucces(response) {
					
					angular.copy(response.data, scope.student);
					scope.student.birthday = new Date(scope.student.birthday);
					
				}, function myError(response) {
					 
				  // error
					
				});					
			};					
			
		};
		
		self.save = function(scope) {	
			
			if (validate(scope)) return;
			
			$http({
			  method: 'POST',
			  url: 'handlers/student-save.php',
			  data: {student_info: scope.student_info}
			}).then(function mySucces(response) {
				
				self.list(scope);
				
			}, function myError(response) {
				 
			  // error
				
			});			
			
		};
		
		self.delete = function(scope,row) {
			
		var onOk = function() {
			
			if (scope.$id > 2) scope = scope.$parent;			
			
			$http({
			  method: 'POST',
			  url: 'handlers/student-delete.php',
			  data: {id_number: [row.id_number]}
			}).then(function mySucces(response) {

				self.list(scope);
				
			}, function myError(response) {
				 
			  // error
				
			});

		};

		bootstrapModal.confirm(scope,'Confirmation','Are you sure you want to delete this record?',onOk,function() {});			
			
		};
		
		self.list = function(scope) {

			scope.student = {};
			scope.student.id_number = 0;			
			$http({
			  method: 'POST',
			  url: 'handlers/students-list.php',
			}).then(function mySucces(response) {
				
				if (scope.$id > 2) scope = scope.$parent;
				angular.copy(response.data, scope.students);
				
			}, function myError(response) {
				 
			  // error
				
			});
			
			$('#x_content').html('Loading...');
			$('#x_content').load('lists/students.html', function() {
				$timeout(function() { $compile($('#x_content')[0])(scope); },100);				
			});				
			
		};
		
	};
	
	return new form();
	
});