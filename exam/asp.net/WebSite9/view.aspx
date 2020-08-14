<%@ Page Language="C#" AutoEventWireup="true" CodeFile="view.aspx.cs" Inherits="WebSite9_view" %>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">
<head runat="server">
    <title></title>
    <style type="text/css">
        .style1
        {
            height: 34px;
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
                <asp:Label ID="Label1" runat="server" Text="id"></asp:Label>
            </td>
            <td>
                <asp:TextBox ID="TextBox1" runat="server"></asp:TextBox>
            </td>
            <td>
                <asp:Button ID="Button6" runat="server" onclick="Button6_Click" Text="logout" />
            </td>

        </tr>
        <tr>
            <td>
                <asp:Label ID="Label2" runat="server" Text="name"></asp:Label>
            </td>
            <td>
                <asp:TextBox ID="TextBox2" runat="server"></asp:TextBox>
            </td>
            <td>
                <asp:RequiredFieldValidator ID="RequiredFieldValidator1" runat="server" 
                    ControlToValidate="TextBox2" ErrorMessage="RequiredFieldValidator" 
                    ForeColor="Red"></asp:RequiredFieldValidator>
                <asp:RegularExpressionValidator ID="RegularExpressionValidator1" runat="server" 
                    ControlToValidate="TextBox2" ErrorMessage="RegularExpressionValidator" 
                    ValidationExpression="\w+([-+.']\w+)*@\w+([-.]\w+)*\.\w+([-.]\w+)*"></asp:RegularExpressionValidator>
            </td>
        </tr>
        <tr>
            <td>
                <asp:Label ID="Label3" runat="server" Text="gender"></asp:Label>
            </td>
            <td>
                <asp:RadioButton ID="RadioButton1" runat="server" GroupName="gender" 
                    Text="male" />
                <asp:RadioButton ID="RadioButton2" runat="server" GroupName="gender" 
                    Text="female" />
            </td>
            <td>
                &nbsp;</td>
        </tr>
        <tr>
            <td>
                <asp:Label ID="Label4" runat="server" Text="city"></asp:Label>
            </td>
            <td>
                <asp:DropDownList ID="DropDownList1" runat="server">
                    <asp:ListItem>surat</asp:ListItem>
                    <asp:ListItem>vapi</asp:ListItem>
                    <asp:ListItem>uk</asp:ListItem>
                </asp:DropDownList>
            </td>
            <td>
                &nbsp;</td>
        </tr>
        <tr>
            <td>
                <asp:Label ID="Label5" runat="server" Text="password"></asp:Label>
            </td>
            <td>
                <asp:TextBox ID="TextBox3" runat="server"></asp:TextBox>
            </td>
            <td>
                &nbsp;</td>
        </tr>
        <tr>
            <td class="style1">
                </td>
            <td class="style1">
                <asp:Button ID="Button1" runat="server" onclick="Button1_Click" Text="insert" />
&nbsp;<asp:Button ID="Button2" runat="server" onclick="Button2_Click" Text="update" />
&nbsp;&nbsp;<asp:Button ID="Button3" runat="server" onclick="Button3_Click" Text="delete" />
&nbsp;<asp:Button ID="Button4" runat="server" onclick="Button4_Click" Text="search" />
            </td>
            <td class="style1">
                </td>
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
                    onselectedindexchanged="GridView1_SelectedIndexChanged">
                </asp:GridView>
            </td>
            <td>
                &nbsp;</td>
        </tr>
    </table>
    </form>
    <p>
        &nbsp;</p>
</body>
</html>
