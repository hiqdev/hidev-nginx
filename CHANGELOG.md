# hiqdev/hidev-nginx

## [0.6.2] - 2017-10-04

- Fixed letscrypt to use `certbot-auto` renamed from letscencrypt-auto ([@hiqsol])
- Fixed deploy to make `reload` <- restart ([@hiqsol])

## [0.6.1] - 2017-05-30

- Fixed hidev 0.6 changes ([@hiqsol])

## [0.6.0] - 2017-05-05

- Redone for hidev 0.6 ([@hiqsol])

## [0.5.0] - 2017-04-24

- Fixed getting IP with `gethostbyname` ([@hiqsol])

## [0.4.6] - 2017-04-18

- Added vhost `domains` option ([@hiqsol])
- Added `fastcgi_read_timeout` nginx option ([@SilverFire])

## [0.4.5] - 2017-02-16

- Added vhost additionalConfig ([@hiqsol])
- Fixed vhost config with `is_args` and `client_max_body_size` ([@SilverFire], [@hiqsol])

## [0.4.4] - 2016-11-19

- Fixed `dump` action ([@hiqsol])
- Added vhost response `timeout` option ([@SilverFire])

## [0.4.3] - 2016-10-21

- Fixed `setLocalIps()` ([@hiqsol])

## [0.4.2] - 2016-09-02

- Added multiple ips and local ips ([@hiqsol])

## [0.4.1] - 2016-05-30

- Fixed X-Real-IP when ssl is disabled ([@hiqsol])

## [0.4.0] - 2016-05-24

- Changed: redone to `composer-config-plugin` ([@hiqsol])

## [0.0.2] - 2016-05-13

- Fixed tests ([@hiqsol])

## [0.0.1] - 2016-05-13

- Fixed dependencies constraints ([@hiqsol])
- Added Let's Encrypt integration ([@hiqsol])
- Added basics ([@hiqsol])

## [Development started] - 2016-05-06

[@hiqsol]: https://github.com/hiqsol
[sol@hiqdev.com]: https://github.com/hiqsol
[@SilverFire]: https://github.com/SilverFire
[d.naumenko.a@gmail.com]: https://github.com/SilverFire
[@tafid]: https://github.com/tafid
[andreyklochok@gmail.com]: https://github.com/tafid
[@BladeRoot]: https://github.com/BladeRoot
[bladeroot@gmail.com]: https://github.com/BladeRoot
[Under development]: https://github.com/hiqdev/hidev-nginx/compare/0.6.1...HEAD
[0.4.4]: https://github.com/hiqdev/hidev-nginx/compare/0.4.3...0.4.4
[0.4.3]: https://github.com/hiqdev/hidev-nginx/compare/0.4.2...0.4.3
[0.4.2]: https://github.com/hiqdev/hidev-nginx/compare/0.4.1...0.4.2
[0.4.1]: https://github.com/hiqdev/hidev-nginx/compare/0.4.0...0.4.1
[0.4.0]: https://github.com/hiqdev/hidev-nginx/compare/0.0.2...0.4.0
[0.0.2]: https://github.com/hiqdev/hidev-nginx/compare/0.0.1...0.0.2
[0.0.1]: https://github.com/hiqdev/hidev-nginx/releases/tag/0.0.1
[0.4.5]: https://github.com/hiqdev/hidev-nginx/compare/0.4.4...0.4.5
[0.4.6]: https://github.com/hiqdev/hidev-nginx/compare/0.4.5...0.4.6
[0.5.0]: https://github.com/hiqdev/hidev-nginx/compare/0.4.6...0.5.0
[0.6.0]: https://github.com/hiqdev/hidev-nginx/compare/0.5.0...0.6.0
[0.6.1]: https://github.com/hiqdev/hidev-nginx/compare/0.6.0...0.6.1
[0.6.2]: https://github.com/hiqdev/hidev-nginx/compare/0.6.1...0.6.2
