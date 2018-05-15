var app = angular.module('todoapp', []).constant('API_URL', 'http://localhost:8000/todos/');;

app.controller('appCtrl', function($scope, $http, API_URL) {
    $http.get(API_URL)
        .then(function(response) {
            $scope.todos = response.data;
            console.log(response)
        },function(error){
            console.log(error)
        });

    /**
     * TODO:
     * 1.use $http to call backend rest API
     * GET todos(Which is corresponding to index() function inside TodoController)(AJAX CALL)
     * 2.store all data in todolist variable, then use ng-repeat to show a list(using ul li tag) in index.html
     */
    //$scope.todoList = undefined;   

    $scope.confirmDelete = function(id) {
    $http({
            method: 'DELETE',
            url: API_URL + id
        }).then(function(response) {
            //console.log(data);
            console.log('deleted')
        },function(error) {
            console.log(error);
            console.log('Unable to delete');
        });
    }
    /**
     * TODO:
     * 1.Each task can be delete. when user click(need to create event handler) on that task.
     * 2.Send delete request to rest API to delete it in mysql database.(AJAX CALL)
     */
    //$scope.isdone = False;
    $scope.store = function() {
    $http({
            method: 'POST',
            url: API_URL,
            data: {task:$scope.taskname, status:$scope.isdone},
            headers: {'Content-Type': 'application/x-www-form-urlencoded'}
        }).then(function(response) {
            console.log(response);
            
        },function(error) {
            console.log(error);
            
        });
    }
    /**
     * TODO:
     * 1.create a form under the todo list
     * 2.user create a new todo task; send data to backend rest API
     * 3.store the new todo task in database and return the new list
     * 4.update $scope.todoList with the API returned new list
     */

    /**
     * optional tasks:
     * 1.edit todo task
     */
});