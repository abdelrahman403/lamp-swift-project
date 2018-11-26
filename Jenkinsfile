pipeline {
    agent any

    environment {
        def test_path = 'application/tests'
        def devRootDir = '/home/swift/public_html'
        def remote = [:]
        remote.name = 'webdev'
        remote.host = '192.168.1.35'
        remote.user = 'vagrant'
        remote.password = 'vagrant'
        remote.allowAnyHosts = true
    }

    stages {
        stage('Cloning From Feature Branch') {
            steps {
                git 'https://github.com/abdelrhman-abdelazim/lamp-swift-project/tree/feature'
            }
        }

        stage('Unit Tests') {
            steps {
                sh'cd ${test_path}'
                sh'phpunit'
            }
        }
        
        stage('Integrating With Integration Branch') {
            steps {
                sh'git checkout feature'
                sh'git pull'
                sh'git checkout integration'
                sh'git merge feature'
            }
        }

        stage('Push To Integration Branch') {
            steps {
                sh'git push origin integration'
            }
        }

        stage('Pull In Dev Machine Using Remote ssh') {
            steps {
                sshCommand remote: remote, command: "cd ${devRootDir}"
                sshCommand remote: remote, command: "git checkout integration"
                sshCommand remote: remote, command: "git pull origin integration"
            }
        }

    }

}


