<?php
require 'vendor/autoload.php';

use Google\Cloud\Firestore\FirestoreClient;


$privateKeyJson = '{
    "type": "service_account",
    "project_id": "db-cyberproyect1",
    "private_key_id": "f34fabb19a713a543561168f831800929d3cd61f",
    "private_key": "-----BEGIN PRIVATE KEY-----\nMIIEvwIBADANBgkqhkiG9w0BAQEFAASCBKkwggSlAgEAAoIBAQDNx+RzN4THuz8X\nGe8jTols6kj/L0BS6lPFXE3ALDzn0wHoWpdpyZFIOUuP+LFKNfWW/C7imjLEMs/O\nxEvpgfUtr/BylFnxVxi0AZbar+44uGtN0Fy+8BpMQQCJq0WZNiWDci8dTuKg5N8Z\nZSLiKXFqEi6SYDd+HFiulgUCbINcpI9oqqGbLuccO5IMkAcxdGJF4rUQzPbTfwaI\nJK0ojl+rbVhxx21AaWpJ3w4IpOouEbyAvWo+a6vlEkJirljVnpgD2r1q4QVd8jIj\nAoTsCqDzdQk8vzncjxsct2xJNCh8KPO6m6pZ5ZNm7md2Jx7TuFKhMWOu9M0da1gO\n9d/07RP5AgMBAAECggEARiTqsvmMSdcCePnuoZ7eSmGMM2wkZX8Zwg8mM6kAs9ch\n8dWbgkRiwPdC0hcoO88r4WUiCD0eq/FUE7um0rhpXkL4V95I0HLraUSXawEIV45J\niXNKgg1vMWoA6GyY41JpNCbCd5+Rsd2CTPJEE0qkLc93z457rAG2mwBpQbvChVu4\nQuOMq5WwVPHIVzAF8Z9urOh7hUW+SVcEoLpzxTaFALo23T+LUm76tpgxCnu9oSd+\nuolc5Fvli1Qo4C/JjlBXNZhN1ldiQt857V2iitThn5glkrpB0yW21vxRSZu05BA5\nf97jfdAbHf7PJvOOgYhRLB/FM+kFOmd0JDbLXY471wKBgQDqLapCFJuvTd/tAORY\nouA+F782Rnrw5e2EKzDxLaOUIflkNGdqubOdZefv1Pw8Ft76iCY/ff5P1pj7+7/g\nf0dCpPn3IwyurC4r0WwqT/fH1GK3FnKgB+TRMIw0+ewJ31KgxNa3pbSVLXZzBHiN\nwo3Iy3QPgfsK3DG4lwBVl78BvwKBgQDg9M12qqmoHRVmehidVOSSgjQyxsDjO7xs\n7lOgqhtl7aEtknl43PxGVPl3Mz4+Id2b61qMBH5SH9C8ysstfP1UgwtLvgPDQNUP\nwqKCAI01K5aHCWfuZzEiE1L+oboxgxSibkR6GIejqhlt5osxDWvCCHi2D5RSwSbB\nGbGf7UJoRwKBgQCQqIzYLSrO6+g726UzK8oiEUFJIdioHyDN2HBvS6YUx7frMoP/\n5Z8Sx/SyrnryE57CXIBkEEycvQ/b+PPalkVK4eaXx8r5y9rproCG0sdZZdVlDDTa\nroWmw7qYrxokLxQ3w+BvqakXzfGxsz1VNK2pMCUNv1l4p/T+9ih6tzaCuQKBgQDU\n55wV9YvAalY4uNHXBeOWrdhNPkKMTZsV1bIcWyK3I2HqSbjhpPS2c/Hu2PbNwyuE\nSAlYf2A2xZm/NId7M9JnS+dC9kGFaDS+R82aEH+UlP5QK5zLy6p6v6NLDzGzboX2\n/Tmd/N1TDsgmdY3DDRqxd2cXmEMe12OgWnr8C4dQPQKBgQC9XhbXqDIzXaW9ZioU\noCBH3cplpEHHhoJgBBxN9NvNwcr+KXyS7IZ1ncDteWKeRBtaVkCI2dtFgZTi9WIo\nKj31D8u7L8KpmgtgXJOChg+AhGTuGGI/15lVlyP3MkqFepkOZaiBUghivGXMOXO+\n1bC1I1oDBBFx2Z6JPyVIIA1ugA==\n-----END PRIVATE KEY-----\n",
    "client_email": "firebase-adminsdk-a3ncg@db-cyberproyect1.iam.gserviceaccount.com",
    "client_id": "101901377635479096042",
    "auth_uri": "https://accounts.google.com/o/oauth2/auth",
    "token_uri": "https://oauth2.googleapis.com/token",
    "auth_provider_x509_cert_url": "https://www.googleapis.com/oauth2/v1/certs",
    "client_x509_cert_url": "https://www.googleapis.com/robot/v1/metadata/x509/firebase-adminsdk-a3ncg%40db-cyberproyect1.iam.gserviceaccount.com",
    "universe_domain": "googleapis.com"
  }';


$firestore = new FirestoreClient([
    'keyFile' => json_decode($privateKeyJson, true)
]);


$_SESSION['conexion']=$firestore;

?>