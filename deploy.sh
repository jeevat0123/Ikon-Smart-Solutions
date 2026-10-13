#!/usr/bin/env bash
# Usage: ./deploy.sh   (needs lftp; credentials in .deploy.env, which is git-ignored)
set -euo pipefail
cd "$(dirname "$0")"
source .deploy.env   # FTP_HOST, FTP_USER, FTP_PASSWORD, FTP_DIR
lftp -u "$FTP_USER","$FTP_PASSWORD" "$FTP_HOST" <<LFTP
set ssl:verify-certificate no
mirror -R --only-newer --verbose \
  --exclude-glob .git/ --exclude-glob .github/ \
  --exclude-glob README.md --exclude-glob deploy.sh --exclude-glob .deploy.env --exclude-glob .gitignore \
  . ${FTP_DIR:-/public_html/}
bye
LFTP
