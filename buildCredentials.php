<?php

$env = parse_ini_file('.env');

$output ='{
  "type": "service_account",
  "project_id": "nosisvoe-translation",
  "private_key_id": "126b6cf9eb67f6f061e94a702186e95e602f4a16",
  "private_key": "'.$env["GOOGLE_SHEETS_KEY"].'",
  "client_email": "estimation@nosisvoe-translation.iam.gserviceaccount.com",
  "client_id": "117605250923202237880",
  "auth_uri": "https://accounts.google.com/o/oauth2/auth",
  "token_uri": "https://oauth2.googleapis.com/token",
  "auth_provider_x509_cert_url": "https://www.googleapis.com/oauth2/v1/certs",
  "client_x509_cert_url": "https://www.googleapis.com/robot/v1/metadata/x509/estimation%40nosisvoe-translation.iam.gserviceaccount.com",
  "universe_domain": "googleapis.com"
}';

file_put_contents('credentials.json', $output);