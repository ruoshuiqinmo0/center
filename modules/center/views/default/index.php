<div class="tpl-content-wrapper">

        <ol class="am-breadcrumb">

            <li><a href="" class="am-icon-home">首页</a></li>
            <li><a href="#">产品管理</a></li>
            <li class="am-active">   </li>
        </ol>
        <div class="tpl-portlet-components">
            <div class="tpl-block">
                <div class="am-g">
                    <form class="am-form" action="" method="get">
                        <!-- <div class="am-u-sm-12 am-u-md-6">
                            <div class="am-btn-toolbar">
                                <div class="am-btn-group am-btn-group-xs">

	                               	<a class="am-btn am-btn-default am-btn-xs am-text-success"  href="{:U('sendMsg',array('test_id'=>$vo['test_id']))}">
	                                	<span class="am-icon-weixin"></span>微信课程消息
	                                </a>

                                </div>
                            </div>
                        </div> -->
                        <div class="am-u-sm-12 am-u-md-3 am-u-md-offset-6">
                            <div class="am-form-group am-input-group-sm">
                                <input type="hidden" name="class_id" value="{$_GET['class_id']}" />
                                <select  name="classes_id">
                                    <option value=''>请选择班级</option>
                                    <option value="{$vo.class_id}" <if condition="$_GET['classes_id'] eq $vo['class_id']" >selected="true"</if> >{$vo.class_name}</option>

                                </select>
                            </div>
                        </div>
                        <input name="class_id"  type="hidden" value="{$_GET['class_id']}" />
                        <div class="am-u-sm-12 am-u-md-3">
                            <div class="am-input-group am-input-group-sm">
                                <input type="text" class="am-form-field"  name="name"  placeholder="请输入搜索产品的名称">
                                <span class="am-input-group-btn">
					            	<button class="am-btn  am-btn-default am-btn-success tpl-am-btn-success am-icon-search" type="submit"></button>
					          	</span>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="am-g">
                    <div class="am-u-sm-12">
                        <table class="am-table am-table-striped am-table-hover table-main">
                            <thead>
                            <tr>
                                <th class="table-check">
                                    <input type="checkbox" class="tpl-table-fz-check" name="ids">
                                </th>
                                <th class="table-type">产品编号</th>
                                <th class="table-type">产品名称</th>
                                <th class="table-type">包名</th>
                                <th class="table-type">状态</th>
                                <th class="table-title">更新时间</th>
                                <th class="table-title">计费列表</th>
                                <th class="table-set">操作</th>
                            </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td><input type="checkbox" name="id" value="{$vo.file_id}"></td>
                                    <td>{$vo.class_name}</td>
                                    <td>{$vo.name}</td>
                                    <td>{$vo.test_name}</td>
                                    <td>{$vo.test_name}</td>
                                    <td>{$vo.test_name}</td>
                                    <td class="qrcode" code="{$vo.max_code|md5}" classes_id="{$Think.get.classes_id}" lesson_id="{$vo.id}" test_id ="{$vo.test_id}"></td>
                                    <td>
                                        <div class="am-btn-toolbar">
                                            <div class="am-btn-group am-btn-group-xs">
                                                <if condition="$_GET['classes_id']">
                                                    <a class="am-btn am-btn-default am-btn-xs am-text-secondary"  href="{:U('getQrcode',array('password'=>md5($vo['max_code']),'classes_id'=>$_GET['classes_id'],'test_id'=>$vo['test_id'],'test_name'=>$vo['test_name']))}">
                                                        <span class="am-icon-download"></span>下载
                                                    </a>
                                                    <else/>
                                                    请先选择班级，点击搜索，再下载
                                                </if>

                                                <!-- <button  type="button" class="am-btn am-btn-default am-btn-xs am-text-success am-hide-sm-only"  id="http://image.legstem.com/{$vo.url}">
                                                    <span class="am-icon-download"></span>下载
                                                </button> -->
                                            </div>
                                        </div>
                                    </td>
                                </tr>

                            </tbody>
                        </table>
                        <div class="am-cf">

                        </div>
                    </div>
                </div>
            </div>
            <div class="tpl-alert"></div>
        </div>
    </div>
</div>
<div class="am-modal am-modal-confirm" tabindex="-1" id="my-confirm">
    <div class="am-modal-dialog">
        <div class="am-modal-hd">小科实验室提醒您</div>
        <div class="am-modal-bd">
            确定下载吗？
        </div>
        <div class="am-modal-footer">
            <span class="am-modal-btn" data-am-modal-cancel>取消</span>
            <span class="am-modal-btn" data-am-modal-confirm>确定</span>
        </div>
    </div>
</div>
<script src="assets/center/js/jquery.min.js"></script>
<script src="assets/center/js/amazeui.min.js"></script>
<script src="assets/center/js/app.js"></script>
<script>
    $(function(){

        $("select[name='classes_id']").change(function(){
            $("form").trigger('submit');
        });

        $('.only_one').on('click', function() {
            var id = $(this).attr("id");

            $('#my-confirm').modal({
                relatedTarget: this,
                onConfirm: function(options) {
                    window.location.href=id;
                },
                // closeOnConfirm: false,
                onCancel: function() {

                }
            });
        });
        //全选
        $(".tpl-table-fz-check").click(function(){
            var ck = $(".tpl-table-fz-check").prop("checked");
            if(ck==true){
                $("input[name=id]").each(function(){
                    $(this).prop("checked" ,"true" )
                });
            }else{
                $("input[name=id]").each(function(){
                    $(this).prop("checked",false)
                });
            }
        });
        $( ".del").bind("click" ,function(){
            var checked_obj=$("input[name='id']:checked");
            if(checked_obj.length==0){
                alert('请选择删除的记录');
                return false;
            }
            var ids= '';
            checked_obj.each(function(index){
                ids+=$(this).val()+',';
            });

            window.location.href;
        });
    });
</script>
</body>

</html>