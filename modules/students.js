angular.module('students-module',[]).factory('form', function($compile,$timeout,$http) {
	
	function form() {
		
		var self = this;
		
		self.data = function(scope) { // initialize data
			
			scope.student = {};
			scope.student.id_number = 0;
			scope.students = [];
			
		};
		
		var required = [];

		self.student = function(scope,row) {						
			
			$('#x_content').html('Loading...');
			$('#x_content').load('forms/student.html',function() {
				$timeout(function() { $compile($('#x_content')[0])(scope); },100);				
			});
			
			if (row != null) {
				$http({
				  method: 'POST',
				  url: 'handlers/student-edit.php',
				  data: {id_number: row.id_number}
				}).then(function mySucces(response) {
					
					angular.copy(response.data, scope.student);
					
				}, function myError(response) {
					 
				  // error
					
				});					
			}
			
		};
		
		self.save = function(scope) {
			
			$http({
			  method: 'POST',
			  url: 'handlers/student-save.php',
			  data: scope.student
			}).then(function mySucces(response) {
				
				self.list(scope);
				
			}, function myError(response) {
				 
			  // error
				
			});			
			
		};
		
		self.delete = function(scope,row) {
			
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
		
		self.list = function(scope) {

			scope.student = {};
			scope.student.id_number = 0;			
			$http({
			  method: 'POST',
			  url: 'handlers/students-list.php',
			}).then(function mySucces(response) {
				
				if (scope.$id > 2) {
					scope = scope.$parent;
					angular.copy(response.data, scope.students);
				} else {
					angular.copy(response.data, scope.students);					
				}
				
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