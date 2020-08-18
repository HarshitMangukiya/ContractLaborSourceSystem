<%@ Page Language="C#" AutoEventWireup="true" CodeFile="view_stor_without.aspx.cs" Inherits="view" %>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">
<head runat="server">
    <title></title>
    <style type="text/css">
        .style1
        {
            height: 23px;
        }
        .style2
        {
            height: 26px;
        }
    </style>
</head>
<body>
    <form id="form1" runat="server">
    <div>
    
    </div>
    <table style="width:100%;">
        <tr>
            <td>
                <asp:Label ID="Label1" runat="server" Text="Label"></asp:Label>
            </td>
            <td>
                <asp:TextBox ID="TextBox1" runat="server"></asp:TextBox>
            </td>
            <td>
                &nbsp;</td>
        </tr>
        <tr>
            <td>
                <asp:Label ID="Label3" runat="server" Text="Label"></asp:Label>
            </td>
            <td>
                <asp:TextBox ID="TextBox2" runat="server"></asp:TextBox>
            </td>
            <td>
                &nbsp;</td>
        </tr>
        <tr>
            <td class="style1">
                <asp:Label ID="Label2" runat="server" Text="Label"></asp:Label>
            </td>
            <td class="style1">
                <asp:TextBox ID="TextBox4" runat="server"></asp:TextBox>
            </td>
            <td class="style1">
            </td>
        </tr>
        <tr>
            <td>
                <asp:Label ID="Label4" runat="server" Text="Label"></asp:Label>
            </td>
            <td>
                <asp:RadioButton ID="RadioButton1" runat="server" GroupName="gender" 
                    Text="male" />
&nbsp;<asp:RadioButton ID="RadioButton2" runat="server" GroupName="gender" Text="female" />
            </td>
            <td>
                &nbsp;</td>
        </tr>
        <tr>
            <td>
                <asp:Label ID="Label5" runat="server" Text="Label"></asp:Label>
            </td>
            <td>
                <asp:DropDownList ID="DropDownList1" runat="server">
                    <asp:ListItem>1</asp:ListItem>
                    <asp:ListItem>2</asp:ListItem>
                    <asp:ListItem>3</asp:ListItem>
                    <asp:ListItem>4</asp:ListItem>
                    <asp:ListItem>5</asp:ListItem>
                    <asp:ListItem>6</asp:ListItem>
                    <asp:ListItem>7</asp:ListItem>
                    <asp:ListItem>8</asp:ListItem>
                    <asp:ListItem>9</asp:ListItem>
                    <asp:ListItem>10</asp:ListItem>
                </asp:DropDownList>
            </td>
            <td>
                &nbsp;</td>
        </tr>
        <tr>
            <td>
                <asp:Label ID="Label6" runat="server" Text="Label"></asp:Label>
            </td>
            <td>
                <asp:CheckBox ID="CheckBox1" runat="server" Text="dancing" />
&nbsp;<asp:CheckBox ID="CheckBox2" runat="server" Text="reading" />
&nbsp;<asp:CheckBox ID="CheckBox3" runat="server" Text="writing" />
&nbsp;</td>
            <td>
                &nbsp;</td>
        </tr>
        <tr>
            <td class="style1">
                <asp:Label ID="Label7" runat="server" Text="Label"></asp:Label>
            </td>
            <td class="style1">
                <asp:DropDownList ID="DropDownList2" runat="server">
                    <asp:ListItem>bsc.it</asp:ListItem>
                    <asp:ListItem>msc.it</asp:ListItem>
                    <asp:ListItem>bca</asp:ListItem>
                </asp:DropDownList>
            </td>
            <td class="style1">
            </td>
        </tr>
        <tr>
            <td>
                <asp:Label ID="Label8" runat="server" Text="Label"></asp:Label>
            </td>
            <td>
                <asp:TextBox ID="TextBox5" runat="server"></asp:TextBox>
            </td>
            <td>
                &nbsp;</td>
        </tr>
        <tr>
            <td>
                <asp:Label ID="Label9" runat="server" Text="Label"></asp:Label>
            </td>
            <td>
                <asp:DropDownList ID="DropDownList3" runat="server" AutoPostBack="True" 
                    onselectedindexchanged="DropDownList3_SelectedIndexChanged" 
                    style="height: 22px">
                    <asp:ListItem>india</asp:ListItem>
                    <asp:ListItem>uk</asp:ListItem>
                    <asp:ListItem>canada</asp:ListItem>
                </asp:DropDownList>
            </td>
            <td>
                &nbsp;</td>
        </tr>
        <tr>
            <td class="style2">
                <asp:Label ID="Label10" runat="server" Text="Label"></asp:Label>
            </td>
            <td class="style2">
                <asp:DropDownList ID="DropDownList4" runat="server" AutoPostBack="True" 
                    onselectedindexchanged="DropDownList4_SelectedIndexChanged">
                </asp:DropDownList>
            </td>
            <td class="style2">
                </td>
        </tr>
        <tr>
            <td class="style2">
                <asp:Label ID="Label11" runat="server" Text="Label"></asp:Label>
            </td>
            <td class="style2">
                <asp:DropDownList ID="DropDownList5" runat="server" AutoPostBack="True">
                </asp:DropDownList>
            </td>
            <td class="style2">
                </td>
        </tr>
        <tr>
            <td>
                <asp:Label ID="Label12" runat="server" Text="Label"></asp:Label>
            </td>
            <td>
                <asp:Image ID="Image1" runat="server" Height="63px" Width="65px" />
                <asp:FileUpload ID="FileUpload1" runat="server" />
            </td>
            <td>
                &nbsp;</td>
        </tr>
        <tr>
            <td>
                <asp:Label ID="Label13" runat="server" Text="Label"></asp:Label>
            </td>
            <td>
                <asp:TextBox ID="TextBox6" runat="server"></asp:TextBox>
            </td>
            <td>
                &nbsp;</td>
        </tr>
        <tr>
            <td>
                &nbsp;</td>
            <td>
                &nbsp;</td>
            <td>
                &nbsp;</td>
        </tr>
        <tr>
            <td>
                &nbsp;</td>
            <td>
                &nbsp;</td>
            <td>
                &nbsp;</td>
        </tr>
        <tr>
            <td>
                &nbsp;</td>
            <td>
                <asp:Button ID="Button1" runat="server" Text="insert" onclick="Button1_Click" />
&nbsp;<asp:Button ID="Button2" runat="server" Text="update" onclick="Button2_Click" />
&nbsp;<asp:Button ID="Button3" runat="server" Text="delete" onclick="Button3_Click" />
&nbsp;<asp:Button ID="Button4" runat="server" Text="search" onclick="Button4_Click" />
            </td>
            <td>
                &nbsp;</td>
        </tr>
        <tr>
            <td>
                &nbsp;</td>
            <td>
                &nbsp;</td>
            <td>
                &nbsp;</td>
        </tr>
        <tr>
            <td>
                &nbsp;</td>
            <td>
                &nbsp;</td>
            <td>
                &nbsp;</td>
        </tr>
        <tr>
            <td>
                &nbsp;</td>
            <td>
                <asp:GridView ID="GridView1" runat="server" AutoGenerateSelectButton="True" 
                    onselectedindexchanged="GridView1_SelectedIndexChanged" AutoGenerateColumns="false">
                    <Columns>
                    <asp:BoundField DataField="id" HeaderText="id"/>
                    <asp:BoundField DataField="name" HeaderText="name"/>
                    <asp:BoundField DataField="password" HeaderText="password"/>
                    <asp:BoundField DataField="gender" HeaderText="gender"/>
                    <asp:BoundField DataField="age" HeaderText="age"/>
                    <asp:BoundField DataField="hobby" HeaderText="hobby"/>
                    <asp:BoundField DataField="course" HeaderText="course"/>
                    <asp:BoundField DataField="phone" HeaderText="phone"/>
                    <asp:BoundField DataField="country" HeaderText="country"/>
                    <asp:BoundField DataField="state" HeaderText="state"/>
                    <asp:BoundField DataField="city" HeaderText="city"/>
                    <asp:ImageField DataImageUrlField="photo" HeaderText="image"/>
                    <asp:BoundField DataField="fees" HeaderText="fees"/>

                    </Columns>
                </asp:GridView>
            </td>
            <td>
                &nbsp;</td>
        </tr>
    </table>
    </form>
</body>
</html>
