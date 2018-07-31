<div class="tpl-content-wrapper">
        <div class="tpl-portlet-components">
            <div class="portlet-title">
                <ol class="am-breadcrumb">
                    <li><a href="#" class="am-icon-home">首页</a></li>
                    <li><a href="{:U('index')}">班级管理</a></li>
                    <li class="am-active">添加班级</li>
                </ol>
            </div>
            <div class="tpl-block ">

                <div class="am-g tpl-amazeui-form">
                    <div class="am-u-sm-12 am-u-md-9">
                        <form class="am-form am-form-horizontal" method="post" action="{:U('insert')}"  data-am-validator>
                            <input name="school_id" type="hidden" value="{$Think.session.school_id}"/>
                            <input name="class_id" type="hidden" value="{$info.class_id}"/>
                            <div class="am-form-group">
                                <label for="user-name" class="am-u-sm-3 am-form-label">班级名称</label>
                                <div class="am-u-sm-9">
                                    <input type="text" id="user-name" name="class_name" placeholder="请输入班级名称"  required>
                                </div>
                            </div>
                            <div class="am-form-group">
                                <label for="user-email" class="am-u-sm-3 am-form-label">班级类型</label>
                                <div class="am-u-sm-9">
                                    <label class="am-radio-inline">
                                        <input type="radio"  value="2"  name="class_type" required>少儿
                                    </label>
                                    <label class="am-radio-inline">
                                        <input type="radio" value="1" name="class_type" > 幼儿
                                    </label>
                                </div>

                            </div>
                            <div class="am-form-group">
                                <label for="user-name" class="am-u-sm-3 am-form-label">上课时间</label>
                                <div class="am-u-sm-9">
                                    <input type="text" id="user-name" name="study_time" placeholder="请输入固定上课时间,例如周六8:00-10:00" required>
                                </div>
                            </div>

                            <div class="am-form-group">
                                <label for="birther" class="am-u-sm-3 am-form-label">开班时间</label>
                                <div class="am-u-sm-9" name="open_time">
                                    <input type="text"  id="birther" name="open_time" class="am-form-field" placeholder="请选择出生日期"  data-am-datepicker readonly required />
                                </div>
                            </div>


                            <div class="am-form-group">
                                <label for="user-email" class="am-u-sm-3 am-form-label">任课老师</label>
                                <div class="am-u-sm-9">
                                    <select name="admin_id">
                                        <volist name="admin" id="vo">
                                            <option value="{$vo.admin_id}">{$vo.username}</option>
                                        </volist>
                                    </select>
                                </div>
                            </div>
                            <div class="am-form-group">
                                <div class="am-u-sm-9 am-u-sm-push-3">
                                    <button type="submit" class="am-btn am-btn-success">提交保存</button>
                                    <button type="button" onclick="window.location.href='__URL__/index'" class="am-btn ">返回</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>


<script src="__PUBLIC__/Edu/js/jquery.min.js"></script>
<script src="__PUBLIC__/Edu/js/amazeui.min.js"></script>
<script src="__PUBLIC__/Edu/js/amazeui.datetimepicker.min.js"></script>
<script src="__PUBLIC__/Edu/js/app.js"></script>
</body>

</html>