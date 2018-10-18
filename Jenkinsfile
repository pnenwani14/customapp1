//Jenkinsfile
node {
stage('Preparation') {
      //Installing kubectl in Jenkins agent
      sh 'curl -LO https://storage.googleapis.com/kubernetes-release/release/$(curl -s https://storage.googleapis.com/kubernetes-release/release/stable.txt)/bin/linux/amd64/kubectl'
  sh 'chmod +x ./kubectl && mv kubectl /usr/sbin && env'
  sh 'env'
  
//Clone git repository
  git url:'https://github.com/pnenwani14/customapp1.git'
   }
stage('Integration') {
 
      withKubeConfig([credentialsId: 'default', serverUrl: 'https://10.55.4.73']) {
      
         status = sh script: 'kubectl get services navbar-service1', returnStdout: true
		 
		 if(status==1){
		 sh 'kubectl create -f deploy/hello-world.yaml'
        }
    else{
        sh 'kubectl delete deployment navbar-deployment'
		sh 'kubectl delete service navbar-service'
		sh 'kubectl create -f deploy/hello-world.yaml'
     }
	
	}
}
}