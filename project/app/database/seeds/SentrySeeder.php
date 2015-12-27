<?php

class SentrySeeder extends Seeder {

    public function run()
    {
        DB::table('users')->delete();
        DB::table('groups')->delete();
        DB::table('users_groups')->delete();

        Sentry::getUserProvider()->create(array(
            'username'      => 'admin',
            'email'      => "hehe@163.com",
            'password'   => "notadmin",
            'first_name' => 'OO',
            'last_name'  => 'XX',
            'activated'  => 1,
        ));

        Sentry::getGroupProvider()->create(array(
            'name'        => 'Admin',
            'permissions' => ['admin' => 1],
        ));

        // 将用户加入用户组
        $adminUser  = Sentry::getUserProvider()->findByLogin('hehe@163.com');
        $adminGroup = Sentry::getGroupProvider()->findByName('Admin');
        $adminUser->addGroup($adminGroup);
    }
}