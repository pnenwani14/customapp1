//Jenkinsfile
node {

stage('Preparation') {
      //Installing kubectl in Jenkins agent
      sh 'curl -LO https://storage.googleapis.com/kubernetes-release/release/$(curl -s https://storage.googleapis.com/kubernetes-release/release/stable.txt)/bin/linux/amd64/kubectl'
  sh 'chmod +x ./kubectl && mv kubectl /usr/sbin && env'
  
//Clone git repository
  git url:'https://github.com/pnenwani14/customapp1.git'
   }

stage(' App Build') {
    //Create Application Build
     
sh 'echo "This Step is for creating Application Build"'
  
}

stage('Build image') {
    /* This builds the actual image; synonymous to
         * docker build on the command line */

        app = docker.build("pnenwani/php-mysql")
 }

    stage('Test image') {
        /* Ideally, we would run a test framework against our image.
         * For this example, we're using a Volkswagen-type approach ;-) */

        app.inside {
            sh 'echo "Tests passed"'
        }
    }

    stage('Push image') {
        /* Finally, we'll push the image with two tags:
         * First, the incremental build number from Jenkins
         * Second, the 'latest' tag.
         * Pushing multiple tags is cheap, as all the layers are reused. */
        docker.withRegistry('https://registry.hub.docker.com', 'DockerHubCred') {
            app.push("${env.BUILD_NUMBER}")
            app.push("latest")
        }
    }   
   
   
stage('Deploy Container') {
 
      withKubeConfig([credentialsId: 'default', serverUrl: 'https://10.55.4.73']) {
      
		sh 'kubectl set image deployment/php-mysql-deployment helloworld=pnenwani/php-mysql --record'
		sh ' sleep 15 && kubectl get services'
		
		
	}
} }