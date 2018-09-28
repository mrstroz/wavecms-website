WaveCMS Website
===============

**WaveCMS Website** is a website template based on [Yii 2 Advanced Project Template](https://github.com/yiisoft/yii2-app-advanced) and [WaveCMS](https://github.com/mrstroz/yii2-wavecms)

The template includes three tiers: front end, back end, and console, each of which
is a separate Yii application.

The template is designed to work in a team development environment. It supports
deploying the application in different environments.

## Installing using Composer

1. Create project
```
composer create-project --prefer-dist mrstroz/wavecms-website website-name
```

2. Init project and apply migrations
```
php init
yii migrate
```

3. Add CMS user 
```
yii wavecms/create [email] [password]
```

## Used extensions
Read extensions docs to more get more info about usage.
1. [WaveCMS](https://github.com/mrstroz/yii2-wavecms)
2. [WaveCMS Page](https://github.com/mrstroz/yii2-wavecms-page)
3. [WaveCMS News](https://github.com/mrstroz/yii2-wavecms-news)
4. [WaveCMS Form](https://github.com/mrstroz/yii2-wavecms-form)

> ![INWAVE LOGO](http://inwave.pl/html/img/logo.png)  
> INWAVE - Internet Software House  
> [inwave.eu](http://inwave.eu/)