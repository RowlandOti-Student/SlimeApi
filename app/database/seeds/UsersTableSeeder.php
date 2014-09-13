<?php


class UsersTableSeeder extends Seeder {

	public function run()
	{
        //Add user using Eloquent
        //$user = new User;
        //$user->username = 'rowland.mtetezi';
        //$user->email = 'rowlandmtetezi@gmail.com';
        //$user->password = Hash::make('i82april');
        //$user->save();

        //Alternatively to eloquent we can also use direct database-methods
        $users = [
        [
        "username" => "rowland.mtetezi",
        "phone" => "0710805009",
        "password" => Hash::make("i82april"),
        "email"    => "rowlandmtetezi@gmail.com",
        "api_token"    => $this->getToken(96)
        ],
        [
        "username" => "keiv.mkivo",
        "phone" => "0714996061",
        "password" => Hash::make("i82april"),
        "email"    => "keiv@live.com",
        "api_token"    => $this->getToken(96)
        ]
        ];

        foreach ($users as $user) 
        {
           User::create($user);
        }
    }

    public function crypto_rand_secure($min, $max) {

        $range = $max - $min;
        if ($range < 0) return $min; // not so random...
        $log = log($range, 2);
        $bytes = (int) ($log / 8) + 1; // length in bytes
        $bits = (int) $log + 1; // length in bits
        $filter = (int) (1 << $bits) - 1; // set all lower bits to 1

        do 
        {
            $rnd = hexdec(bin2hex(openssl_random_pseudo_bytes($bytes)));
            $rnd = $rnd & $filter; // discard irrelevant bits
        } 

        while ($rnd >= $range);

        return $min + $rnd;
    }

    public function getToken($length) {

        $token = "";
        $codeAlphabet = "ABCDEFGHIJKLMNOPQRSTUVWXYZ";
        $codeAlphabet.= "abcdefghijklmnopqrstuvwxyz";
        $codeAlphabet.= "0123456789";

        for($i=0;$i<$length;$i++)
        {
            $token .= $codeAlphabet[$this->crypto_rand_secure(0,strlen($codeAlphabet))];
        }

        return $token;
    }
}
