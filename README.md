AWS Lightsail Automatic Snapshot Purging
=

Usage
-

Copy vendor/dlowhorn/purge-snapshots/bin/purgeSnapshots.php to root of your project, then:

```
php purgeSnapshots.php [resource name] [aws region] [days to keep] [api version]
```

Example
-

**Delete any automatic snapshot older than 5 days:**
```
php purgeSnapshots.php my-lightsail-instance-name us-east-1 5 2016-11-28
```
