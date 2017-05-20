angular.module('subjects-module',['bootstrap-modal']).factory('form', function($compile,$timeout,$http,bootstrapModal) {
	
	function form() {
		
		var self = this;
		
		self.data = function(scope) { // initialize data

			scope.formHolder = {};		

			scope.subject_info = {};
			scope.subject_info.id_number = 0;

			scope.subjects = []; // list			

		};

		function validate(scope) {
			
			var controls = scope.formHolder.subjectform.$$controls;
			
			angular.forEach(controls,function(elem,i) {
				
				if (elem.$$attr.$attr.required) elem.$touched = elem.$invalid;
									
			});

			return scope.formHolder.subjectform.$invalid;
			
		};

		self.subject = function(scope,row) {						
			
			scope.subject_info = {};
			scope.subject_info.id_number = 0;

			$('#x_content').html('Loading...');
			$('#x_content').load('forms/subject.html',function() {
				$timeout(function() { $compile($('#x_content')[0])(scope); },100);				
			});
			
			if (row != null) {
				if (scope.$id > 2) scope = scope.$parent;				
				$http({
				  method: 'POST',
				  url: 'handlers/subject-edit.php',
				  data: {id_number: row.id_number}
				}).then(function mySucces(response) {
					
					angular.copy(response.data['subject_info'], scope.subject_info);
					
				}, function myError(response) {
					 
				  // error
					
				});					
			};					
			
		};
		
		self.save = function(scope) {	
			
			if (validate(scope)) return;
			
			$http({
			  method: 'POST',
			  url: 'handlers/subject-save.php',
			  data: {subject_info: scope.subject_info}
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
			  url: 'handlers/subject-delete.php',
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

			scope.subject = {};
			scope.subject.id_number = 0;			
			$http({
			  method: 'POST',
			  url: 'handlers/subjects-list.php',
			}).then(function mySucces(response) {
				
				if (scope.$id > 2) scope = scope.$parent;
				angular.copy(response.data, scope.subjects);
				
			}, function myError(response) {
				 
			  // error
				
			});
			
			$('#x_content').html('Loading...');
			$('#x_content').load('lists/subjects.html', function() {
				$timeout(function() { $compile($('#x_content')[0])(scope); },100);				
			});				
			
		};
		
	};
	
	return new form();
	
});