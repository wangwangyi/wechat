
    <div id="tab{{$index}}" class="tab-pane @if($index==0) active @endif">
        <table class="table table-bordered">
            <thead>
            <tr>
                <td>级别</td>
                <td>类型</td>
                <td>名称</td>
                <td>值</td>
            </tr>
            </thead>
            <tbody>
            <tr>
                <td>
                    一级菜单
                </td>
                <td>
                    <select  class="form-control" name="buttons[{{$index}}][type]">
                        <option value="click" @if(isset($button["type"]) and $button["type"] == 'click') selected @endif>
                            click
                        </option>

                        <option value="view" @if(isset($button["type"]) and $button["type"] == 'view') selected @endif>
                            view
                        </option>

                    </select>
                </td>
                <td>
                    <input type="text" class="form-control" name="buttons[{{$index}}][name]" value="{{$button['name'] or ''}}">
                </td>
                <td>
                    <input type="text" class="form-control" name="buttons[{{$index}}][value]"
                           @if (isset($button["key"]))
                           value="{{$button["key"]}}"
                           @elseif (isset($button["url"]))
                           value="{{$button["url"]}}"
                           @else
                           value=""
                            @endif>
                </td>
            </tr>

            @for ($i = 0; $i < 5; $i++)

                <tr>
                    <td>二级菜单：{{$i+1}}</td>
                    <td>
                        <select  class="form-control" name="buttons[{{$index}}][sub_button][{{$i}}][type]">
                            <option value="click" @if(isset($button['sub_button']["$i"]["type"]) and $button['sub_button']["$i"]["type"]== 'click') selected @endif>
                                click
                            </option>

                            <option value="view" @if(isset($button['sub_button']["$i"]["type"]) and $button['sub_button']["$i"]["type"] == 'view') selected @endif>
                                view
                            </option>

                        </select>
                    </td>
                    <td>
                        <input type="text" class="form-control" name="buttons[{{$index}}][sub_button][{{$i}}][name]"
                               value="{{$button['sub_button']["$i"]["name"] or ''}}">
                    </td>
                    <td>
                        <input type="text" class="form-control" name="buttons[{{$index}}][sub_button][{{$i}}][value]"
                               @if (isset($button['sub_button']["$i"]["key"]))
                               value="{{$button['sub_button']["$i"]["key"]}}"
                               @elseif (isset($button['sub_button']["$i"]["url"]))
                               value="{{$button['sub_button']["$i"]["url"]}}"
                               @else
                               value=""
                                @endif>
                    </td>
                </tr>
            @endfor
            </tbody>
        </table>
    </div>
