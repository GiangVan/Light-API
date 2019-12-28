<?php

includeModel('GraphQLModule', 'ResultType/BooleanResult');
includeModel('GraphQLModule', 'ResultType/AccountResult');
includeModel('GraphQLModule', 'ResultType/FriendResultArray');
includeModel('GraphQLModule', 'ResultType/FriendRequestResultArray');
includeModel('GraphQLModule', 'ResultType/BlockedAccountResultArray');
includeModel('GraphQLModule', 'ResultType/AuthResult');
includeModel('GraphQLModule', 'ResultType/UploadResult');
includeModel('GraphQLModule', 'ResultType/VisitedAccountResult');
includeModel('GraphQLModule', 'ResultType/VisitedAccountResultArray');
includeModel('GraphQLModule', 'ResultType/GameChannelResultArray');
includeModel('GraphQLModule', 'ResultType/GameChannelResult');
includeModel('GraphQLModule', 'ResultType/FeedbackResultArray');

class PostResolveController{
    public function index(RoutingData $data){
        $resolves = [
            'Query' => [
                'getAccount' => function ($rootValues, $args) use($data) : ?AccountResult{
                    includeModel('GraphQLModule', 'Resolve/GetAccount');
                    $array_account = GetAccount::resolve($args);

                    return $array_account == null ? null : new AccountResult($array_account);
                },
                'getAllFriend' => function ($rootValues, $args) use($data) : ?FriendResultArray{
                    includeModel('GraphQLModule', 'Resolve/GetAllFriend');
                    $account_array = GetAllFriend::resolve($args);
                    
                    return $account_array == null ? null : new FriendResultArray($account_array);
                },
                'getAllFriendRequestReceived' => function ($rootValues, $args) use($data) : ?FriendRequestResultArray{
                    includeModel('GraphQLModule', 'Resolve/GetAllFriendRequestReceived');
                    $account_array = GetAllFriendRequestReceived::resolve($args);
                    
                    return $account_array == null ? null : new FriendRequestResultArray($account_array);
                },
                'getAllFriendRequestDelivered' => function ($rootValues, $args) use($data) : ?FriendRequestResultArray{
                    includeModel('GraphQLModule', 'Resolve/GetAllFriendRequestDelivered');
                    $account_array = GetAllFriendRequestDelivered::resolve($args);
                    
                    return $account_array == null ? null : new FriendRequestResultArray($account_array);
                },
                'visitAccount' => function ($rootValues, $args) use($data) : ?VisitedAccountResult{
                    includeModel('GraphQLModule', 'Resolve/VisitAccount');
                    $array_account = VisitAccount::resolve($args);
                    
                    return $array_account == null ? null : new VisitedAccountResult($array_account);
                },
                'getAllBlockedAccount' => function ($rootValues, $args) use($data) : ?BlockedAccountResultArray{
                    includeModel('GraphQLModule', 'Resolve/GetAllBlockedAccount');
                    $array_account = GetAllBlockedAccount::resolve($args);
                    
                    return $array_account == null ? null : new BlockedAccountResultArray($array_account);
                },
                'getAllGameChannel' => function ($rootValues, $args) use($data) : ?GameChannelResultArray{
                    includeModel('GraphQLModule', 'Resolve/GetAllGameChannel');
                    $game_channel_array = GetAllGameChannel::resolve();
                    
                    return $game_channel_array == null ? null : new GameChannelResultArray($game_channel_array);
                },
                'searchAccount' => function ($rootValues, $args) use($data) : ?VisitedAccountResultArray{
                    includeModel('GraphQLModule', 'Resolve/SearchAccount');
                    $account_array = SearchAccount::resolve($args);
                    
                    return $account_array == null ? null : new VisitedAccountResultArray($account_array);
                },
                'getAllFeedback' => function ($rootValues, $args) use($data) : ?FeedbackResultArray{
                    includeModel('GraphQLModule', 'Resolve/GetAllFeedback');
                    $feedback_array = GetAllFeedback::resolve($args);
                    
                    return $feedback_array == null ? null : new FeedbackResultArray($feedback_array);
                },
            ],
            'Mutation' => [
                'register' => function ($rootValues, $args) use($data) : ?AuthResult{
                    includeModel('GraphQLModule', 'Resolve/Auth/Register');
                    $login_session = Register::resolve($args, $data);

                    return $login_session == null ? null : new AuthResult($login_session->access_token, $login_session->code_token);
                },
                'login' => function ($rootValues, $args) use($data) : ?AuthResult{
                    includeModel('GraphQLModule', 'Resolve/Auth/Login');
                    $login_session = Login::resolve($args);
                    
                    return $login_session == null ? null : new AuthResult($login_session->access_token, $login_session->code_token);
                },
                'logout' => function ($rootValues, $args) use($data) : ?BooleanResult{
                    includeModel('GraphQLModule', 'Resolve/Auth/Logout');

                    return new BooleanResult(Logout::resolve($args));
                },
                'roomBackgroundUpload' => function ($rootValues, $args) use($data) : ?UploadResult{
                    includeModel('GraphQLModule', 'Resolve/Upload/RoomBackgroundUpload');
                    $result = RoomBackgroundUpload::resolve($args, $data);

                    return new UploadResult($result['path'], $result['describe']);
                },
                'gameChannelBackgroundUpload' => function ($rootValues, $args) use($data) : ?UploadResult{
                    includeModel('GraphQLModule', 'Resolve/Upload/GameChannelBackgroundUpload');
                    $result = GameChannelBackgroundUpload::resolve($args, $data);

                    return new UploadResult($result['path'], $result['describe']);
                },
                'accountBackgroundUpload' => function ($rootValues, $args) use($data) : ?UploadResult{
                    includeModel('GraphQLModule', 'Resolve/Upload/AccountBackgroundUpload');
                    $result = AccountBackgroundUpload::resolve($args, $data);

                    return new UploadResult($result['path'], $result['describe']);
                },
                'accountAvatarUpload' => function ($rootValues, $args) use($data) : ?UploadResult{
                    includeModel('GraphQLModule', 'Resolve/Upload/AccountAvatarUpload');
                    $result = AccountAvatarUpload::resolve($args, $data);

                    return new UploadResult($result['path'], $result['describe']);
                },
                'addNewGameChannel' => function ($rootValues, $args) use($data) : ?GameChannelResult{
                    includeModel('GraphQLModule', 'Resolve/AddNewGameChannel');
                    $channel = AddNewGameChannel::resolve($args, $data);

                    return $channel == null ? null : new GameChannelResult($channel);
                },
                'editGameChannel' => function ($rootValues, $args) use($data) : ?GameChannelResult{
                    includeModel('GraphQLModule', 'Resolve/EditGameChannel');
                    $channel = EditGameChannel::resolve($args, $data);

                    return $channel == null ? null : new GameChannelResult($channel);
                },
                'sendFriendRequest' => function ($rootValues, $args) use($data) : ?BooleanResult{
                    includeModel('GraphQLModule', 'Resolve/SendFriendRequest');
                    $result = SendFriendRequest::resolve($args);

                    return new BooleanResult($result['result'], $result['describe']);
                },
                'unsendFriendRequest' => function ($rootValues, $args) use($data) : ?BooleanResult{
                    includeModel('GraphQLModule', 'Resolve/UnsendFriendRequest');
                    $result = UnsendFriendRequest::resolve($args);

                    return new BooleanResult($result['result'], $result['describe']);
                },
                'acceptFriendRequest' => function ($rootValues, $args) use($data) : ?BooleanResult{
                    includeModel('GraphQLModule', 'Resolve/AcceptFriendRequest');
                    $result = AcceptFriendRequest::resolve($args);

                    return new BooleanResult($result['result'], $result['describe']);
                },
                'cancelFriendRequest' => function ($rootValues, $args) use($data) : ?BooleanResult{
                    includeModel('GraphQLModule', 'Resolve/CancelFriendRequest');
                    $result = CancelFriendRequest::resolve($args);

                    return new BooleanResult($result['result'], $result['describe']);
                },
                'unFriend' => function ($rootValues, $args) use($data) : ?BooleanResult{
                    includeModel('GraphQLModule', 'Resolve/UnFriend');
                    $result = UnFriend::resolve($args);

                    return new BooleanResult($result['result'], $result['describe']);
                },
                'blockAccount' => function ($rootValues, $args) use($data) : ?BooleanResult{
                    includeModel('GraphQLModule', 'Resolve/BlockAccount');
                    $result = BlockAccount::resolve($args);

                    return new BooleanResult($result['result'], $result['describe']);
                },
                'unblockAccount' => function ($rootValues, $args) use($data) : ?BooleanResult{
                    includeModel('GraphQLModule', 'Resolve/UnblockAccount');
                    $result = UnblockAccount::resolve($args);

                    return new BooleanResult($result['result'], $result['describe']);
                },
                'sendFeedback' => function ($rootValues, $args) use($data) : ?BooleanResult{
                    includeModel('GraphQLModule', 'Resolve/SendFeedback');
                    $result = SendFeedback::resolve($args);

                    return new BooleanResult($result['result'], $result['describe']);
                },
            ]
        ];







        return compact('resolves');
    }
}