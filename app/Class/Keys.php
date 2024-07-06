<?php

namespace App\Class;

class Keys
{
    private $properties = [
        'UserTable' => 'users',
        'USER_UID' => 'user_uid',
        'UserCredentialsTable' => 'user_credentials',
        'UserOtherTable' => 'user_other',
        'UserUsernameTable' => 'user_username',
        'UserProfileTable' => 'user_profile',
        'UserFavoriteTable' => 'user_favorite',
        'UserFollowerTable' => 'user_follower',
        'UserFollowingTable' => 'user_following',
        'ForgotPasswordTable' => 'forgot_password',
        'PostTable' => 'post',
        'PostImageTable' => 'post_image',
        'PostCommentTable' => 'post_comment',
        'PostCommentImageTable' => 'post_comment_image',
        'PostLikeTable' => 'post_like',
        'PostSavedTable' => 'post_saved',
        'PostSharedTable' => 'post_shared',
        'PostTagTable' => 'post_tag',
        'PostViewTable' => 'post_view',
        'PostHideTable' => 'post_hide',
        'PostEditTable' => 'post_edit',
        'PostSettingTable' => 'post_setting',
        'PostReportTable' => 'post_report',
        'ID' => 'id',
        'UID' => 'uid',
        'UserID' => 'user_id',
        'Username' => 'username',
        'FirstName' => 'first_name',
        'MiddleName' => 'middle_name',
        'LastName' => 'last_name',
        'FullName' => 'full_name',
        'Suffix' => 'suffix',
        'Sex' => 'sex',
        'Age' => 'age',
        'Gender' => 'gender',
        'MS' => 'ms',
        'Bio' => 'bio',
        'BioStatus' => 'bio_status',
        'Verify' => 'verify',
        'VerifyStatus' => 'verify_status',
        'Profile' => 'profile',
        'Extension' => 'extension',
        'Auth' => 'auth',
        'PrimaryKey' => 'primary_key',
        'PrivateKey' => 'private_key',
        'Email' => 'email',
        'Phone' => 'phone',
        'EmailVerified' => 'email_verified',
        'PhoneVerified' => 'phone_verified',
        'Password' => 'password',
        'ConfirmPassword' => 'confirm_password',
        'FollowerID' => 'follower_id',
        'FollowingID' => 'following_id',
        'Follower' => 'follower',
        'Following' => 'following',
        'Favorite' => 'favorite',
        'Block' => 'block',
        'Ban' => 'ban',
        'Token' => 'token',
        'PostID' => 'post_id',
        'PushKey' => 'push_key',
        'ImageKey' => 'image_key',
        'CommentKey' => 'comment_key',
        'ShareKey' => 'share_key',
        'Title' => 'title',
        'AuthorId' => 'author_id',
        'Context' => 'context',
        'Content' => 'content',
        'Image' => 'image',
        'ImageName' => 'image_name',
        'ImageStatus' => 'image_status',
        'CommentStatus' => 'comment_status',
        'ShareStatus' => 'share_status',
        'PostStatus' => 'post_status',
        'Photos' => 'photos',
        'Status' => 'status',
        'Message' => 'message',
        'Suggestion' => 'suggestion',
        'Search' => 'search',
        'User' => 'user',
        'Post' => 'post',
        'Hashtag' => 'hashtag',
        'Error' => 'error',
        'Success' => 'success',
        'Code' => 'code',
        'Continue' => '100',
        'SwitchingProtocols' => '101',
        'Processing' => '102',
        'OK' => '200',
        'Created' => '201',
        'Accepted' => '202',
        'NonAuthoritativeInformation' => '203',
        'NoContent' => '204',
        'ResetContent' => '205',
        'PartialContent' => '206',
        'MultiStatus' => '207',
        'AlreadyReported' => '208',
        'IMUsed' => '226',
        'MultipleChoices' => '300',
        'MovedPermanently' => '301',
        'Found' => '302',
        'SeeOther' => '303',
        'NotModified' => '304',
        'UseProxy' => '305',
        'Unused' => '306',
        'TemporaryRedirect' => '307',
        'PermanentRedirect' => '308',
        'BadRequest' => '400',
        'Unauthorized' => '401',
        'PaymentRequired' => '402',
        'Forbidden' => '403',
        'NotFound' => '404',
        'MethodNotAllowed' => '405',
        'NotAcceptable' => '406',
        'ProxyAuthenticationRequired' => '407',
        'RequestTimeout' => '408',
        'Conflict' => '409',
        'Gone' => '410',
        'LengthRequired' => '411',
        'PreconditionFailed' => '412',
        'PayloadTooLarge' => '413',
        'URITooLong' => '414',
        'UnsupportedMediaType' => '415',
        'RangeNotSatisfiable' => '416',
        'ExpectationFailed' => '417',
        'ImATeapot' => '418',
        'MisdirectedRequest' => '421',
        'UnprocessableEntity' => '422',
        'Locked' => '423',
        'FailedDependency' => '424',
        'TooEarly' => '425',
        'UpgradeRequired' => '426',
        'PreconditionRequired' => '428',
        'TooManyRequests' => '429',
        'RequestHeaderFieldsTooLarge' => '431',
        'UnavailableForLegalReasons' => '451',
        'InternalServerError' => '500',
        'NotImplemented' => '501',
        'BadGateway' => '502',
        'ServiceUnavailable' => '503',
        'GatewayTimeout' => '504',
        'HTTPVersionNotSupported' => '505',
        'VariantAlsoNegotiates' => '506',
        'InsufficientStorage' => '507',
        'LoopDetected' => '508',
        'NotExtended' => '510',
        'NetworkAuthenticationRequired' => '511',
    ];

    public function __get($name)
    {
        return $this->properties[$name] ?? null;
    }

}
