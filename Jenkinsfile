//Jenkinsfile
node {
stage('Preparation') {
      //Installing kubectl in Jenkins agent
      sh 'echo "Kubectl Installed"'
//Clone git repository
  git url:'https://github.com/pnenwani14/customapp1.git'
   }
stage('Integration') {
 
      withKubeConfig([credentialsId: 'default', serverUrl: 'https://10.55.4.73']) {
      
         sh 'kubectl create cm nodejs-app --from-file=src/ --namespace=myapp-integration -o=yaml --dry-run > deploy/cm.yaml'
         sh 'kubectl apply -f deploy/ --namespace=myapp-integration'
         try{
          //Gathering Node.js app's external IP address
          def ip = ''
          def count = 0
          def countLimit = 10
       
          //Waiting loop for IP address provisioning
          println("Waiting for IP address")        
          while(ip=='' && count<countLimit) {
           sleep 30
           ip = sh script: 'kubectl get svc --namespace=myapp-integration -o jsonpath="{.items[?(@.metadata.name==\'nginx-reverseproxy-service\')].status.loadBalancer.ingress[*].ip}"', returnStdout: true
           ip=ip.trim()
           count++                                                                              
          }
        
    if(ip==''){
     error("Not able to get the IP address. Aborting...")
        }
    else{
                //Executing tests 
     sh "chmod +x tests/integration-tests.sh && ./tests/integration-tests.sh ${ip}"
  
     //Cleaning the integration environment
     println("Cleaning integration environment...")
     sh 'kubectl delete -f deploy --namespace=myapp-integration'
         println("Integration stage finished.")   
    }                      
      
         }
    catch(Exception e) {
     println("Integration stage failed.")
      println("Cleaning integration environment...")
      sh 'kubectl delete -f deploy --namespace=myapp-integration'
          error("Exiting...")                                     
         }
}
   }
 stage('Production') {
      withKubeConfig([credentialsId: 'default', serverUrl: 'https://10.55.4.73']) {
      
       sh 'kubectl create cm nodejs-app --from-file=src/ --namespace=myapp-production -o=yaml --dry-run > deploy/cm.yaml'
sh 'kubectl apply -f deploy/ --namespace=myapp-production'
      
  
      //Gathering Node.js app's external IP address
         def ip = ''
         def count = 0
         def countLimit = 10
        
         //Waiting loop for IP address provisioning
         println("Waiting for IP address")        
         while(ip=='' && count<countLimit) {
          sleep 30
          ip = sh script: 'kubectl get svc --namespace=myapp-production -o jsonpath="{.items[?(@.metadata.name==\'nginx-reverseproxy-service\')].status.loadBalancer.ingress[*].ip}"', returnStdout: true
          ip = ip.trim()
          count++                                                                              
     }
       
   if(ip==''){
    error("Not able to get the IP address. Aborting...")
       
   }
   else{
               //Executing tests 
    sh "chmod +x tests/production-tests.sh && ./tests/production-tests.sh ${ip}"     
          }                                    
      }
   }
}