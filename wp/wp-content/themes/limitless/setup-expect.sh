#!/usr/bin/expect -f

# Automated SSH setup with expect
set timeout 60
set password "RpTu12BtuJzdVzghz9ZE!"

spawn ssh -p 65002 u333982692@151.106.110.29

expect {
    "password:" {
        send "$password\r"
        exp_continue
    }
    "$ " {
        # We're logged in, run the setup commands
        send "cd /public_html/wp-content/themes/\r"
        expect "$ "
        
        send "rm -rf limitless\r"
        expect "$ "
        
        send "git clone https://github.com/mattdowney/limitless.git limitless\r"
        expect "$ "
        
        send "cd limitless\r"
        expect "$ "
        
        send "npm install\r"
        expect "$ "
        
        send "npm run build:css\r"
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

puts "Setup completed successfully!"