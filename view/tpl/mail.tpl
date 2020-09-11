<html lang="ja">

<head>
    <meta http-equiv="Content-Type" content="text/html" />
    <meta charset="ISO-2022-JP" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <title>HTMLメール テンプレート</title>
</head>

<body style="font-family: Helvetica, Arial, sans-serif;font-size: 16px;color: black;margin: 0">
    <div class="wrap" style="padding: 0 15px">
        <table id="thin_mail"
            style="border-spacing: 0;border-collapse: collapse;max-width: 600px;margin: 0 auto;width: 100%;border-top: 3px #52619e solid">
            <thead>
                <tr class="header">
                    <th class="logo" colspan="2"
                        style="padding: 0;font-weight: normal;text-align: left;padding-top: 20px;padding-bottom: 20px">
                        <img src="http://www.xblog.shop/mail/logo.png" alt="Company logo" width="82"
                            style="max-width: 100%;border: 0;outline: 0;vertical-align: middle;color: #2837b8;font-size: 14px;-ms-interpolation-mode: bicubic" />
                    </th>
                    <th colspan="1"
                        style="padding: 0;font-weight: normal;padding-top: 20px;padding-bottom: 20px;text-align: right;font-size: 12px;width: 175px">
                        <a href="#" style="color: #2837b8;text-decoration: underline;letter-spacing: -0.4em">
                            <span
                                style="margin-right: 5px;display: inline-block;vertical-align: middle;letter-spacing: normal;color: #A8B0B6;line-height: 1">WEBサイトを見る</span>
                            <img src="http://www.xblog.shop/mail/openBrowser.png" width="15" height="15"
                                style="max-width: 100%;border: 0;outline: 0;vertical-align: middle;color: #2837b8;font-size: 14px;-ms-interpolation-mode: bicubic;display: inline-block;letter-spacing: normal" /></a>
                    </th>
                </tr>
            </thead>
            <tbody>

                <tr class="main_img">
                    <th colspan="3" style="padding: 0;font-weight: normal"><img
                            src="http://www.xblog.shop/mail/bigImg.png" alt="" width="600"
                            style="max-width: 100%;border: 0;outline: 0;vertical-align: middle;color: #2837b8;font-size: 14px;-ms-interpolation-mode: bicubic" />
                    </th>
                </tr>

                <tr class="main_txt">
                    <th colspan="3"
                        style="padding: 10px 10px;font-weight: normal;background-color: #2d3867;color: #fff;text-align: right;font-size: 15px">
                        <% echo(title) %></th>
                </tr>
                <tr>
                    <th colspan="3" height="25" style="padding: 0;font-weight: normal" />
                </tr>
                <tr class="information_title">
                    <th colspan="3"
                        style="padding: 5px 10px;font-weight: normal;color: #2d3867;line-height: 1.5;border-top: 1px solid #2d3867;text-align: center;font-size: 14px;border-bottom: 1px solid #2d3867">
                        <% echo(name) %>様よりお問い合わせがありました。</th>
                </tr>
                <tr>
                    <th colspan="3" height="25" style="padding: 0;font-weight: normal" />
                </tr>
                <tr class="sub_information_title">
                    <th colspan="3" style="padding: 0;font-weight: normal">
                        <p class="title"
                            style="line-height: 1.6em;margin: 0 0 15px;border-left: 3px solid #2d3867;text-align: left;padding-left: 10px;font-size: 14px">
                            お客様情報</p>
                        <% def(list_customer) %>
                        <% each(list_customer) %>
                        <p class="sub_text"
                            style="line-height: 1.6em;margin: 0 0 6px;font-size: 12px;text-align: left;word-break: break-all">
                            <% echo(list_customer/title) %><% echo(list_customer/customer) %></p>
                        <% /each %>
                        <% /def %>
                    </th>
                </tr>
                <tr>
                    <th colspan="3" height="15" style="padding: 0;font-weight: normal" />
                </tr>
                <tr class="sub_information_title">
                    <th colspan="3" style="padding: 0;font-weight: normal">
                        <p class="title"
                            style="line-height: 1.6em;margin: 0 0 15px;border-left: 3px solid #2d3867;text-align: left;padding-left: 10px;font-size: 14px">
                            お問い合わせ情報</p>

                        <% def(list_data) %>
                        <% each(list_data) %>
                        <p class="sub_text"
                            style="line-height: 1.6em;margin: 0 0 6px;font-size: 12px;text-align: left;word-break: break-all">
                            <% echo(list_data/title) %><% echo(list_data/data) %></p>
                        <% /each %>
                        <% /def %>
                    </th>
                </tr>
            </tbody>
            <tfoot>
                <tr>
                    <th colspan="3" height="20" style="padding: 0;font-weight: normal" />
                </tr>
                <tr class="sns">
                    <th colspan="2"
                        style="padding: 10px;font-weight: normal;text-align: left;font-size: 12px;background-color: #52619e;color: #fff">
                        SNS</th>
                    <td colspan="1" style="padding: 0;text-align: center;width: 144px;letter-spacing: -0.4em">
                        <a href="#"
                            style="color: #2837b8;text-decoration: underline;padding: 5px 0;background-color: #3e4a7f;display: inline-block;letter-spacing: normal;vertical-align: middle;width: 50%"><img
                                src="http://www.xblog.shop/mail/facebook.png" alt="" width="37" height="37"
                                style="max-width: 100%;border: 0;outline: 0;vertical-align: middle;color: #2837b8;font-size: 14px;-ms-interpolation-mode: bicubic" /></a>
                        <a href="#" class="last"
                            style="color: #2837b8;text-decoration: underline;padding: 5px 0;background-color: #2d3867;display: inline-block;letter-spacing: normal;vertical-align: middle;width: 50%"><img
                                src="http://www.xblog.shop/mail/twitter.png" alt="" width="37" height="37"
                                style="max-width: 100%;border: 0;outline: 0;vertical-align: middle;color: #2837b8;font-size: 14px;-ms-interpolation-mode: bicubic" /></a>
                    </td>
                </tr>
                <tr>
                    <th colspan="3" height="20" style="padding: 0;font-weight: normal" />
                </tr>
                <tr class="small_txt">
                    <th colspan="3"
                        style="padding: 0;font-weight: normal;font-size: 10px;color: #A8B0B6;text-align: left">
                        管理者宛にお問い合わせ通知メールを配信しています。※このメールは、tpl雛形から作成しています。
                    </th>
                </tr>
                <tr>
                    <th colspan="3" height="10" style="padding: 0;font-weight: normal" />
                </tr>
                <tr class="small_txt">
                    <th colspan="3"
                        style="padding: 0;font-weight: normal;font-size: 10px;color: #A8B0B6;text-align: left">
                        □発行：ダミー株式会社<br />
                        □住所：東京都ダミー<br />
                        □編集：ダミー<br />
                        □発行日：<% dval(date01,'Y年m月d日') %>
                    </th>
                </tr>
                <tr>
                    <th colspan="3" height="15" style="padding: 0;font-weight: normal" />
                </tr>
                <tr>
                    <th colspan="3" style="padding: 0;font-weight: normal"><img
                            src="http://www.xblog.shop/mail/logo.png" alt="Company logo" width="82"
                            style="max-width: 100%;border: 0;outline: 0;vertical-align: middle;color: #2837b8;font-size: 14px;-ms-interpolation-mode: bicubic" />
                    </th>
                </tr>
                <tr>
                    <th colspan="3" height="10" style="padding: 0;font-weight: normal" />
                </tr>
                <tr class="small_txt">
                    <th colspan="3" class="ta_c"
                        style="padding: 0;font-weight: normal;text-align: center !important;font-size: 10px;color: #A8B0B6">
                        Copyright (C) <% dval(date01,'Y') %> Thin.
                    </th>
                </tr>
            </tfoot>
        </table>
    </div>

</body>

</html>