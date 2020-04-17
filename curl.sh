#!/bin/bash
nc -l 8080 &

curl "http://localhost:8080" \
-H "Accept: application/json" \
-H "Content-Type: application/json" \
--data @<(cat <<EOF
{
  "me": "$USER",
  "something": $(date +%s)
}
EOF
)
