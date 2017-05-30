# hiqdev/hidev-nginx

## [0.6.1] - 2017-05-30

- Fixed hidev 0.6 changes
    - [fb47281] 2017-05-30 csfixed [@hiqsol]
    - [b12bdfc] 2017-05-08 csfixed [@hiqsol]
    - [25e8824] 2017-05-05 fixed take(package) [@hiqsol]

## [0.6.0] - 2017-05-05

- Redone for hidev 0.6
    - [1ca2351] 2017-05-05 csfixed [@hiqsol]
    - [d698f82] 2017-05-05 fixed vhost conf rendering [@hiqsol]
    - [c31f5c4] 2017-05-04 redoing to new hidev [@hiqsol]
    - [e9cebe9] 2017-05-04 redoing to new hidev [@hiqsol]

## [0.5.0] - 2017-04-24

- Fixed getting IP with `gethostbyname`
    - [a7da99d] 2017-04-24 csfixed [@hiqsol]
    - [14534e3] 2017-04-24 fixed getting ip with `gethostbyname` [@hiqsol]

## [0.4.6] - 2017-04-18

- Added vhost `domains` option
    - [5ab365a] 2017-04-18 csfixed [@hiqsol]
    - [8b5d309] 2017-04-18 switched to phpunit 6 [@hiqsol]
    - [18c2731] 2017-04-18 added `VhostController::setDomains` for vhost.domains option [@hiqsol]
- Added `fastcgi_read_timeout` nginx option
    - [1003884] 2017-03-12 Added `fastcgi_read_timeout` option [@SilverFire]

## [0.4.5] - 2017-02-16

- Added vhost additionalConfig
    - [2705216] 2017-02-16 fixed tests [@hiqsol]
    - [6b1133c] 2017-02-15 csfixed [@hiqsol]
    - [844cc89] 2017-02-15 added vhost additionalConfig [@hiqsol]
    - [b7f3765] 2016-12-26 csfixed [@hiqsol]
- Fixed vhost config with `is_args` and `client_max_body_size`
    - [0742b17] 2016-12-12 Added `client_max_body_size` to nginx config [@SilverFire]
    - [c119255] 2016-11-24 fixed tests for `is_args` [@hiqsol]
    - [7be0bd3] 2016-11-24 used `$is_args` nginx variable [@hiqsol]

## [0.4.4] - 2016-11-19

- Fixed `dump` action
    - [249e5d4] 2016-11-15 fixed `dump` action: used perform for before/after [@hiqsol]
- Added vhost response `timeout` option
    - [c29edec] 2016-11-15 Added vhost response timeout option [@SilverFire]

## [0.4.3] - 2016-10-21

- Fixed `setLocalIps()`
    - [3ab36c2] 2016-10-21 fixed IPs doubling [@hiqsol]
    - [3f3d62b] 2016-10-12 fixed setLocalIps() [@hiqsol]
    - [4ef1798] 2016-09-02 added ip read-only property to VhostController [@hiqsol]

## [0.4.2] - 2016-09-02

- Added multiple ips and local ips
    - [d0c7ba5] 2016-09-02 used `chkipper` [@hiqsol]
    - [3b8fcdc] 2016-07-29 added multiple ips and local ips [@hiqsol]
    - [00bc8a8] 2016-05-30 fixed tests [@hiqsol]

## [0.4.1] - 2016-05-30

- Fixed X-Real-IP when ssl is disabled
    - [cf7fa7e] 2016-05-30 csfixed [@hiqsol]
    - [7403c56] 2016-05-30 fixed x-real-ip when ssh is disabled [@hiqsol]
    - [297ec05] 2016-05-24 used `hiqdev/hidev-hiqdev` [@hiqsol]

## [0.4.0] - 2016-05-24

- Changed: redone to `composer-config-plugin`
    - [986e83e] 2016-05-24 fixed tests [@hiqsol]
    - [c205e6f] 2016-05-24 redone to `composer-config-plugin` [@hiqsol]

## [0.0.2] - 2016-05-13

- Fixed tests
    - [1b237cd] 2016-05-13 fixed functional tests with assertFiles [@hiqsol]

## [0.0.1] - 2016-05-13

- Fixed dependencies constraints
    - [8cbb8d7] 2016-05-13 fixed dependencies constraints [@hiqsol]
    - [c880ceb] 2016-05-13 fixing dependencies constraints [@hiqsol]
- Added Let's Encrypt integration
    - [230e3de] 2016-05-12 + `/tmp/php-fpm.sock` fpm socket variant [@hiqsol]
    - [8c9b014] 2016-05-12 fixed test case according to changes [@hiqsol]
    - [5d2ae9d] 2016-05-12 renamed `do` -> `make` [@hiqsol]
    - [4d971e6] 2016-05-12 added `VhostController::getDomains` [@hiqsol]
    - [1a2c6c8] 2016-05-12 + allow well-known for letsencrypt [@hiqsol]
    - [c271ba9] 2016-05-12 csfixed [@hiqsol]
    - [215b457] 2016-05-12 enabled before and after in nginx goal [@hiqsol]
    - [9ee4d6e] 2016-05-12 added `aliases` [@hiqsol]
    - [bfcfded] 2016-05-12 fixed pathes building [@hiqsol]
    - [a7d46eb] 2016-05-11 used asset-packagist.org and hidev-config moved to src/config [@hiqsol]
    - [b7d7eb1] 2016-05-11 fixed functional test [@hiqsol]
    - [3c808f8] 2016-05-11 + LetsEncrypt integration [@hiqsol]
    - [d981b7d] 2016-05-08 + nginx deploy and restart actions [@hiqsol]
- Added basics
    - [ea1f5b0] 2016-05-07 added default vhost with same name [@hiqsol]
    - [56019ba] 2016-05-06 csfixed [@hiqsol]
    - [ad8e303] 2016-05-06 fixed tests [@hiqsol]
    - [e592bcd] 2016-05-06 added functional tests [@hiqsol]
    - [eeffa35] 2016-05-06 inited [@hiqsol]

## [Development started] - 2016-05-06

[@hiqsol]: https://github.com/hiqsol
[sol@hiqdev.com]: https://github.com/hiqsol
[@SilverFire]: https://github.com/SilverFire
[d.naumenko.a@gmail.com]: https://github.com/SilverFire
[@tafid]: https://github.com/tafid
[andreyklochok@gmail.com]: https://github.com/tafid
[@BladeRoot]: https://github.com/BladeRoot
[bladeroot@gmail.com]: https://github.com/BladeRoot
[cf7fa7e]: https://github.com/hiqdev/hidev-nginx/commit/cf7fa7e
[7403c56]: https://github.com/hiqdev/hidev-nginx/commit/7403c56
[297ec05]: https://github.com/hiqdev/hidev-nginx/commit/297ec05
[986e83e]: https://github.com/hiqdev/hidev-nginx/commit/986e83e
[c205e6f]: https://github.com/hiqdev/hidev-nginx/commit/c205e6f
[1b237cd]: https://github.com/hiqdev/hidev-nginx/commit/1b237cd
[8cbb8d7]: https://github.com/hiqdev/hidev-nginx/commit/8cbb8d7
[c880ceb]: https://github.com/hiqdev/hidev-nginx/commit/c880ceb
[230e3de]: https://github.com/hiqdev/hidev-nginx/commit/230e3de
[8c9b014]: https://github.com/hiqdev/hidev-nginx/commit/8c9b014
[5d2ae9d]: https://github.com/hiqdev/hidev-nginx/commit/5d2ae9d
[4d971e6]: https://github.com/hiqdev/hidev-nginx/commit/4d971e6
[1a2c6c8]: https://github.com/hiqdev/hidev-nginx/commit/1a2c6c8
[c271ba9]: https://github.com/hiqdev/hidev-nginx/commit/c271ba9
[215b457]: https://github.com/hiqdev/hidev-nginx/commit/215b457
[9ee4d6e]: https://github.com/hiqdev/hidev-nginx/commit/9ee4d6e
[bfcfded]: https://github.com/hiqdev/hidev-nginx/commit/bfcfded
[a7d46eb]: https://github.com/hiqdev/hidev-nginx/commit/a7d46eb
[b7d7eb1]: https://github.com/hiqdev/hidev-nginx/commit/b7d7eb1
[3c808f8]: https://github.com/hiqdev/hidev-nginx/commit/3c808f8
[d981b7d]: https://github.com/hiqdev/hidev-nginx/commit/d981b7d
[ea1f5b0]: https://github.com/hiqdev/hidev-nginx/commit/ea1f5b0
[56019ba]: https://github.com/hiqdev/hidev-nginx/commit/56019ba
[ad8e303]: https://github.com/hiqdev/hidev-nginx/commit/ad8e303
[e592bcd]: https://github.com/hiqdev/hidev-nginx/commit/e592bcd
[eeffa35]: https://github.com/hiqdev/hidev-nginx/commit/eeffa35
[3b8fcdc]: https://github.com/hiqdev/hidev-nginx/commit/3b8fcdc
[00bc8a8]: https://github.com/hiqdev/hidev-nginx/commit/00bc8a8
[d0c7ba5]: https://github.com/hiqdev/hidev-nginx/commit/d0c7ba5
[3ab36c2]: https://github.com/hiqdev/hidev-nginx/commit/3ab36c2
[3f3d62b]: https://github.com/hiqdev/hidev-nginx/commit/3f3d62b
[4ef1798]: https://github.com/hiqdev/hidev-nginx/commit/4ef1798
[249e5d4]: https://github.com/hiqdev/hidev-nginx/commit/249e5d4
[c29edec]: https://github.com/hiqdev/hidev-nginx/commit/c29edec
[6b1133c]: https://github.com/hiqdev/hidev-nginx/commit/6b1133c
[844cc89]: https://github.com/hiqdev/hidev-nginx/commit/844cc89
[b7f3765]: https://github.com/hiqdev/hidev-nginx/commit/b7f3765
[0742b17]: https://github.com/hiqdev/hidev-nginx/commit/0742b17
[c119255]: https://github.com/hiqdev/hidev-nginx/commit/c119255
[7be0bd3]: https://github.com/hiqdev/hidev-nginx/commit/7be0bd3
[Under development]: https://github.com/hiqdev/hidev-nginx/compare/0.6.0...HEAD
[0.4.4]: https://github.com/hiqdev/hidev-nginx/compare/0.4.3...0.4.4
[0.4.3]: https://github.com/hiqdev/hidev-nginx/compare/0.4.2...0.4.3
[0.4.2]: https://github.com/hiqdev/hidev-nginx/compare/0.4.1...0.4.2
[0.4.1]: https://github.com/hiqdev/hidev-nginx/compare/0.4.0...0.4.1
[0.4.0]: https://github.com/hiqdev/hidev-nginx/compare/0.0.2...0.4.0
[0.0.2]: https://github.com/hiqdev/hidev-nginx/compare/0.0.1...0.0.2
[0.0.1]: https://github.com/hiqdev/hidev-nginx/releases/tag/0.0.1
[2705216]: https://github.com/hiqdev/hidev-nginx/commit/2705216
[0.4.5]: https://github.com/hiqdev/hidev-nginx/compare/0.4.4...0.4.5
[5ab365a]: https://github.com/hiqdev/hidev-nginx/commit/5ab365a
[8b5d309]: https://github.com/hiqdev/hidev-nginx/commit/8b5d309
[18c2731]: https://github.com/hiqdev/hidev-nginx/commit/18c2731
[1003884]: https://github.com/hiqdev/hidev-nginx/commit/1003884
[0.4.6]: https://github.com/hiqdev/hidev-nginx/compare/0.4.5...0.4.6
[14534e3]: https://github.com/hiqdev/hidev-nginx/commit/14534e3
[a7da99d]: https://github.com/hiqdev/hidev-nginx/commit/a7da99d
[0.5.0]: https://github.com/hiqdev/hidev-nginx/compare/0.4.6...0.5.0
[1ca2351]: https://github.com/hiqdev/hidev-nginx/commit/1ca2351
[d698f82]: https://github.com/hiqdev/hidev-nginx/commit/d698f82
[c31f5c4]: https://github.com/hiqdev/hidev-nginx/commit/c31f5c4
[e9cebe9]: https://github.com/hiqdev/hidev-nginx/commit/e9cebe9
[0.6.0]: https://github.com/hiqdev/hidev-nginx/compare/0.5.0...0.6.0
[fb47281]: https://github.com/hiqdev/hidev-nginx/commit/fb47281
[b12bdfc]: https://github.com/hiqdev/hidev-nginx/commit/b12bdfc
[25e8824]: https://github.com/hiqdev/hidev-nginx/commit/25e8824
[0.6.1]: https://github.com/hiqdev/hidev-nginx/compare/0.6.0...0.6.1
