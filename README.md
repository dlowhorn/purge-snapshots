AWS Lightsail Automatic Snapshot Purging
=

Usage
-
```
php vendor/dlowhorn/purge-snapshots/bin/purgeSnapshots.php [resource name] [aws region] [days to keep] [api version]
```

Example
-

**Delete any automatic snapshot older than 5 days:**
```
php vendor/dlowhorn/purge-snapshots/bin/purgeSnapshots.php my-lightsail-instance-name us-east-1 5 2016-11-28
```
