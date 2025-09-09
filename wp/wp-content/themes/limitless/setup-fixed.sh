#!/usr/bin/expect -f

set timeout 60
set password "RpTu12BtuJzdVzghz9ZE!"

spawn ssh -p 65002 u333982692@151.106.110.29

expect {
    "password:" {
        send "$password\r"
        exp_continue
    }
    "$ " {
        # Find the correct path to WordPress
        send "ls -la public_html\r"
        expect "$ "
        
        send "cd public_html/wp-content/themes/\r"
        expect "$ "
        
        send "pwd\r"
        expect "$ "
        
        send "rm -rf limitless\r"
        expect "$ "
        
        # Try to clone without authentication first (public repo)
        send "git clone https://github.com/mattdowney/limitless.git limitless --depth 1\r"
        expect {
            "Username" {
                send "\r"
                expect "Password"
                send "\r"
                expect "$ "
            }
            "$ " { }
        }
        
        send "ls -la\r"
        expect "$ "
        
        send "cd limitless\r"
        expect "$ "
        
        send "ls -la\r"
        expect "$ "
        
        send "exit\r"
    }
    timeout {
        puts "Connection timed out"
        exit 1
    }
}

puts "Setup completed!"