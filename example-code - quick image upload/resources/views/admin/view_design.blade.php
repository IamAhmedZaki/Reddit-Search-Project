<style>
iframe {
    position: absolute;
    height: 100vh;
    width: 100vw;
    margin: 0;
    padding: 0;
    top: 0px;
    bottom: 0px;
    right: 0px;

}
</style>
<div style="text-align: center; margin-top:35px;">
    <iframe width="1850" id="app" height="850" class="iframe-res" style="height: 100%;    width: 100%;" id="myIframe"
        src="https://playcanv.as/e/p/md0CjQtX/" frameborder="0">
    </iframe>
</div>

<script>
    var design = @json($design);
    console.log("design", design);
    let app = document.getElementById("app");


    window.onmessage = event => {
        if (event.data == "app:ready") {
            app.contentWindow.postMessage("size:" + design.select_size, "*");
            app.contentWindow.postMessage("mainColor1:" + design.mainColor1, "*");
            app.contentWindow.postMessage("mainColor2:" + design.mainColor2, "*");
            app.contentWindow.postMessage("lefWallStatus:" + design.lefWallStatus, "*");
            app.contentWindow.postMessage("leftWallHeight:" + design.leftWallHeight, "*");
            app.contentWindow.postMessage("rightWallStatus:" + design.rightWallStatus, "*");
            app.contentWindow.postMessage("rightWallHeight:" + design.rightWallHeight, "*");
            app.contentWindow.postMessage("backWallStatus:" + design.backWallStatus, "*");
            app.contentWindow.postMessage("table_box:" + design.table_box, "*");
            app.contentWindow.postMessage("leftFlag:" + design.leftFlag, "*");
            app.contentWindow.postMessage("rightFlag:" + design.rightFlag, "*");
            setTimeout(() => {


                app.contentWindow.postMessage("canvasBottom:" + (design.canvasBottomBase64 || ""), "*");

                app.contentWindow.postMessage("canvasBottomBlack:" + (design.canvasBottomBlackBase64 ||
                    ""), "*");

                app.contentWindow.postMessage("canvasRight3x4:" + (design.canvasRight3x4Base64 || ""),
                    "*");

                app.contentWindow.postMessage("canvasRightBlack3x4:" + (design
                    .canvasRightBlack3x4Base64 || ""), "*");

                app.contentWindow.postMessage("canvasBottom3x4:" + (design.canvasBottom3x4Base64 || ""),
                    "*");

                app.contentWindow.postMessage("canvasBottomBlack3x4:" + (design
                    .canvasBottomBlack3x4Base64 || ""), "*");

                app.contentWindow.postMessage("canvasRight3x6:" + (design.canvasRight3x6Base64 || ""),
                    "*");

                app.contentWindow.postMessage("canvasRightBlack3x6:" + (design
                    .canvasRightBlack3x6Base64 || ""), "*");

                app.contentWindow.postMessage("canvasBottom3x6:" + (design.canvasBottom3x6Base64 || ""),
                    "*");

                app.contentWindow.postMessage("canvasBottomBlack3x6:" + (design
                    .canvasBottomBlack3x6Base64 || ""), "*");

                app.contentWindow.postMessage("tableTop:" + (design.tableTopBase64 || ""), "*");

                app.contentWindow.postMessage("tableRight:" + (design.tableRightBase64 || ""), "*");

                app.contentWindow.postMessage("tableCenter:" + (design.tableCenterBase64 || ""), "*");

                app.contentWindow.postMessage("tableLeft:" + (design.tableLeftBase64 || ""), "*");

                app.contentWindow.postMessage("tableBottom:" + (design.tableBottomBase64 || ""), "*");

                app.contentWindow.postMessage("flagLeft:" + (design.flagLeftBase64 || ""), "*");

                app.contentWindow.postMessage("flagRight:" + (design.flagRightBase64 || ""), "*");

                app.contentWindow.postMessage("canvasLeftHalfWall:" + (design.canvasLeftHalfWallBase64 ||
                    ""), "*");

                app.contentWindow.postMessage("canvasLeftFullWall:" + (design.canvasLeftFullWallBase64 ||
                    ""), "*");

                app.contentWindow.postMessage("canvasRightHalfWall:" + (design
                    .canvasRightHalfWallBase64 || ""), "*");

                app.contentWindow.postMessage("canvasRightFullWall:" + (design
                    .canvasRightFullWallBase64 || ""), "*");

                app.contentWindow.postMessage("canvasBackWall3x3:" + (design.canvasBackWall3x3Base64 ||
                    ""), "*");

                app.contentWindow.postMessage("canvasBackWall3x4:" + (design.canvasBackWall3x4Base64 ||
                    ""), "*");

                app.contentWindow.postMessage("canvasBackWall3x6:" + (design.canvasBackWall3x6Base64 ||
                    ""), "*");
            }, 1000);
        }
    }
</script>
