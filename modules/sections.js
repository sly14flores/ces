angular.module('sections-module',['bootstrap-modal']).factory('form', function($compile,$timeout,$http,bootstrapModal) {
	
	function form() {
		
		var self = this;
		
		self.data = function(scope) { // initialize data

			scope.formHolder = {};		

			scope.section_info = {};
			scope.section_info.id_number = 0;

			scope.section = []; // list			

		};

		function validate(scope) {
			
			var controls = scope.formHolder.sectionform.$$controls;
			
			angular.forEach(controls,function(elem,i) {
				
				if (elem.$$attr.$attr.required) elem.$touched = elem.$invalid;
									
			});

			return scope.formHolder.sectionform.$invalid;
			
		};

		self.section = function(scope,row) {						
			
			scope.section_info = {};
			scope.section_info.id_number = 0;

			$('#x_content').html('Loading...');
			$('#x_content').load('forms/section.html',function() {
				$timeout(function() { $compile($('#x_content')[0])(scope); },100);				
			});
			
			if (row != null) {
				if (scope.$id > 2) scope = scope.$parent;				
				$http({
				  method: 'POST',
				  url: 'handlers/section-edit.php',
				  data: {id_number: row.id_number}
				}).then(function mySucces(response) {
					
					angular.copy(response.data, scope.section_info);
					
				}, function myError(response) {
					 
				  // error
					
				});					
			};					
			
		};
		
		self.save = function(scope) {	
			
			if (validate(scope)) return;
			
			$http({
			  method: 'POST',
			  url: 'handlers/section-save.php',
			  data: {section_info: scope.section_info}
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
			  url: 'handlers/section-delete.php',
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

			scope.section = {};
			scope.section.id_number = 0;			
			$http({
			  method: 'POST',
			  url: 'handlers/sections-list.php',
			}).then(function mySucces(response) {
				
				scope.sections = response.data;
				
			}, function myError(response) {
				 
			  // error
				
			});
			
			$('#x_content').html('Loading...');
			$('#x_content').load('lists/sections.html', function() {
				$timeout(function() { $compile($('#x_content')[0])(scope); },100);				
			});				
			
		};
		
	};
	
	return new form();
	
});