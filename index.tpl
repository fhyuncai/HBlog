<html>

<head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="./lib/mdui-v0.4.1/css/mdui.min.css">
</head>

<body class="mdui-appbar-with-toolbar mdui-theme-primary-light-blue mdui-theme-accent-blue">
    <!-- Header Start 头部 -->
    <header>
        <div class="mdui-appbar mdui-appbar-fixed mdui-appbar-scroll-toolbar-hide">
            <div class="mdui-toolbar mdui-color-theme">
                <a href="javascript:;" class="mdui-btn mdui-btn-icon" mdui-drawer="{target: '#main-drawer', swipe: true,overlay: true}"><i
                        class="mdui-icon material-icons">menu</i></a>
                <a href="javascript:;" class="mdui-typo-headline">Hblog</a>
                <!-- 待添加...不知道加什么 -->
                <!-- <div class="mdui-toolbar-spacer"></div>
                <a href="javascript:;" class="mdui-btn mdui-btn-icon"><i class="mdui-icon material-icons">search</i></a>
                <a href="javascript:;" class="mdui-btn mdui-btn-icon"><i class="mdui-icon material-icons">refresh</i></a>
                <a href="javascript:;" class="mdui-btn mdui-btn-icon"><i class="mdui-icon material-icons">more_vert</i></a> -->
            </div>
        </div>
    </header>
    <!-- Header end 头部 -->
    <!-- Drawer start 抽屉菜单 -->
    <div class="mdui-drawer mdui-drawer-close mdui-drawer-full-height" id="main-drawer" mdui-drawer="{overlay: true}"
        style="background:#fff">
        <ul class="mdui-list">
            <li class="mdui-list-item mdui-ripple">
                <div class="mdui-list-item-content">~{Name}~</div>
                <i class="mdui-list-item-icon mdui-icon material-icons">move_to_inbox</i><!-- 图标 -->
            </li>
            <li class="mdui-list-item mdui-ripple">
                <div class="mdui-list-item-content">~{Name}~</div>
                <i class="mdui-list-item-icon mdui-icon material-icons">send</i>
            </li>
            <li class="mdui-list-item mdui-ripple">
                <div class="mdui-list-item-content">~{Name}~</div>
                <i class="mdui-list-item-icon mdui-icon material-icons">delete</i>
            </li>
            <li class="mdui-list-item mdui-ripple">
                <div class="mdui-list-item-content">~{Name}~</div>
                <i class="mdui-list-item-icon mdui-icon material-icons">error</i>
            </li>
        </ul>
    </div>
    <!--Drawer end 抽屉菜单  -->
    <!-- Main start 主部分 -->
    <br />
    <div class="mdui-card mdui-container mdui-hoverable" style="padding:0px">
        <div class="mdui-card-header">
            <img class="mdui-card-header-avatar" src="https://bing.woshiluo.site/n" />
            <div class="mdui-card-header-title">云智团队</div>
            <div class="mdui-card-header-subtitle">云智团队文案监修中...</div>
        </div>
        <div class="mdui-card-media">
            <img src="https://bing.woshiluo.site/n?idx=1" />
        </div>
        <div class="mdui-card-primary">
            <div class="mdui-card-primary-title">HBlog - A light blog</div>
            <div class="mdui-card-primary-subtitle">轻博客</div>
        </div>
        <div class="mdui-card-content">~{个人简介}~</div>
    </div>
    <br />
    <div class="mdui-row-xs-1 mdui-row-sm-1 mdui-row-md-2 mdui-row-lg-2 mdui-row-xl-2 mdui-grid-list">
        <div class="mdui-col">
            <div class="mdui-card mdui-container mdui-hoverable" style="padding:0px">
                <div class="mdui-card-media">
                    <img src="https://bing.woshiluo.site/n/rand.php" />
                    <div class="mdui-card-media-covered mdui-card-media-covered-gradient">
                        <div class="mdui-card-primary">
                            <div class="mdui-card-primary-title">~{Title}~</div>
                            <div class="mdui-card-primary-subtitle">~{Date}~ / ~{浏览次数}~</div><!-- 可以考虑增加图标 -->
                        </div>
                    </div>
                </div>
                <div class="mdui-card-content">~{文章缩略简介}~</div>
                <div class="mdui-card-actions">
                    <button class="mdui-btn mdui-ripple">Read more >></button>
                    <div class="mdui-float-right">
                        <div class="mdui-chip">
                            <span class="mdui-chip-icon"><i class="mdui-icon material-icons">&#xe54e;</i></span>
                            <span class="mdui-chip-title">~{标签}~</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="mdui-col">
            <div class="mdui-card mdui-container mdui-hoverable" style="padding:0px">
                <div class="mdui-card-media">
                    <img src="https://bing.woshiluo.site/n/rand.php" />
                    <div class="mdui-card-media-covered mdui-card-media-covered-gradient">
                        <div class="mdui-card-primary">
                            <div class="mdui-card-primary-title">~{Title}~</div>
                            <div class="mdui-card-primary-subtitle">~{Date}~ / ~{浏览次数}~</div><!-- 可以考虑增加图标 -->
                        </div>
                    </div>
                </div>
                <div class="mdui-card-content">~{文章缩略简介}~</div>
                <div class="mdui-card-actions">
                    <button class="mdui-btn mdui-ripple">Read more >></button>
                    <div class="mdui-float-right">
                        <div class="mdui-chip">
                            <span class="mdui-chip-icon"><i class="mdui-icon material-icons">&#xe54e;</i></span>
                            <span class="mdui-chip-title">~{标签}~</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <br />
    <!-- Main end 主部分 -->
    <script src="./lib/mdui-v0.4.1/js/mdui.min.js"></script>
</body>

</html>