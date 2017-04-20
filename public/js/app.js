var app = angular.module('sin.app', ['ngAnimate', 'ui.bootstrap']);
app.factory('blogFactory', ['$http', '$q', function ($http, $q) {
    return {
        getComment: function (url) {
            var deferred = $q.defer();
            $http.get(url, {
                headers: {
                    "X-Requested-With": "XMLHttpRequest",
                    "Content-Type": "application/json"
                }
            }).then(function (res) {
                deferred.resolve(res.data);
            }, function (err) {
                deferred.reject({
                    err: 'cannot get data',
                    reason: err
                });
            });
            return deferred.promise;
        },
        postComment: function (url, data) {
            var deferred = $q.defer();
            $http.post(url, data, {
                headers: {
                    "X-Requested-With": "XMLHttpRequest",
                    "Content-Type": "application/json"
                }
            }).then(function (res) {
                deferred.resolve(res.data);
            }, function (err) {
                deferred.reject(err.data);
            });
            return deferred.promise;
        },
        putComment: function (url, data) {
            var deferred = $q.defer();
            $http.put(url, data, {
                headers: {
                    "X-Requested-With": "XMLHttpRequest",
                    "Content-Type": "application/json"
                }
            }).then(function (res) {
                deferred.resolve(res.data);
            }, function (err) {
                deferred.reject(err.data);
            });
            return deferred.promise;
        },
        deleteComment: function (url) {
            var deferred = $q.defer();
            $http.delete(url, {
                headers: {
                    "X-Requested-With": "XMLHttpRequest",
                    "Content-Type": "application/json"
                }
            }).then(function (res) {
                deferred.resolve(res.data);
            }, function (err) {
                deferred.reject(err.data);
            });
            return deferred.promise;
        }
    }
}]);

app.controller('commentController', ['$scope', 'blogFactory', function($scope, blogFactory) {
    console.log($scope);
    $scope.comments = [];
    $scope.comment = {
        author:null,
        content:null,
        likes_count:0,
        created_at:null
    }

    $scope.$watch('article_id', function(){
        $scope.showComments();
    });


    $scope.showComments = function(){
        var url = '/xhr/article/'+$scope.article_id+'/comment';
        blogFactory.getComment(url).then(function (res) {
             $scope.comments = res
        }, function (err) {
            console.log(err)
        });
    }

    $scope.send = function(){
        var url = '/xhr/article/'+$scope.article_id+'/comment';
        blogFactory.postComment(url, $scope.comment).then(function (res) {
            $scope.comments.push(res);
            $scope.errors = [];
            $scope.comment = null;
            $scope.commentForm.$setPristine();
            $scope.commentForm.$setUntouched();
        }, function (err) {
            $scope.errors = err;
        });
    }

    $scope.like = function(comment){
        var url = '/xhr/comment/'+comment.id+'/like';
        blogFactory.putComment(url, null).then(function (res) {
            comment.likes_count+=1;
        }, function (err) {
            $scope.errors = err;
        });
    }
    $scope.delete = function(comment){
        var url = '/xhr/comment/'+comment.id;
        blogFactory.deleteComment(url, null).then(function (res) {
            console.log('dz');
            for(var index=0;index<$scope.comments.length;index++){
                if($scope.comments[index].id === comment.id){
                    $scope.comments.splice(index, 1);
                    break;
                }
            }
        }, function (err) {
            $scope.errors = err;
        });
    }

    $scope.closeAlert = function(index) {
        $scope.errors.splice(index, 1);
    };


}]);