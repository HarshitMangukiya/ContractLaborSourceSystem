<%@ Page Language="C#" AutoEventWireup="true" CodeFile="view_admin.aspx.cs" Inherits="register" %>

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
        .style3
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
                <asp:Label ID="Label1" runat="server" Text="id"></asp:Label>
            </td>
            <td>
                <asp:TextBox ID="TextBox1" runat="server"></asp:TextBox>
            </td>
            <td>
                &nbsp;</td>
        </tr>
        <tr>
            <asp:Label ID="Label2" runat="server" Text="Label"></asp:Label>
            <td class="style1">
                <asp:Label ID="Label3" runat="server" Text="catrgory id"></asp:Label>
            </td>
            <td class="style1">
                <asp:DropDownList ID="DropDownList1" runat="server">
                </asp:DropDownList>
            </td>
            <td class="style1">
            </td>
        </tr>
        <tr>
            <td class="style2">
                <asp:Label ID="Label4" runat="server" Text="name"></asp:Label>
            </td>
            <td class="style2">
                <asp:TextBox ID="TextBox2" runat="server"></asp:TextBox>
            </td>
            <td class="style2">
            </td>
        </tr>
        <tr>
            <td>
                <asp:Label ID="Label5" runat="server" Text="price"></asp:Label>
            </td>
            <td>
                <asp:TextBox ID="TextBox3" runat="server"></asp:TextBox>
            </td>
            <td>
                &nbsp;</td>
        </tr>
        <tr>
            <td>
                <asp:Label ID="Label6" runat="server" Text="Label"></asp:Label>
            </td>
            <td>
                <asp:Image ID="Image1" runat="server" Height="40px" Width="85px" />
                <asp:FileUpload ID="FileUpload1" runat="server" />
            </td>
            <td>
                &nbsp;</td>
        </tr>
        <tr>
            <td>
                <asp:Label ID="Label7" runat="server" Text="desc"></asp:Label>
            </td>
            <td>
                <asp:TextBox ID="TextBox4" runat="server"></asp:TextBox>
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
            <td class="style3">
            </td>
            <td class="style3">
                <asp:Button ID="Button1" runat="server" onclick="Button1_Click" Text="insert" />
&nbsp;<asp:Button ID="Button2" runat="server" Text="update" onclick="Button2_Click" />
&nbsp;<asp:Button ID="Button3" runat="server" Text="delete" onclick="Button3_Click" />
&nbsp;<asp:Button ID="Button4" runat="server" Text="search" onclick="Button4_Click" />
            </td>
            <td class="style3">
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
                &nbsp;</td>
            <td>
                &nbsp;</td>
        </tr>
        <tr>
            <td>
                &nbsp;</td>
            <td>
                <asp:GridView ID="GridView1" runat="server" AutoGenerateColumns="false" 
                    AutoGenerateSelectButton="True" 
                    onselectedindexchanged="GridView1_SelectedIndexChanged">
                <Columns>
                <asp:BoundField DataField="Productid" HeaderText="productid" />
                <asp:BoundField DataField="categoryid" HeaderText="categoryid" />
                    <asp:BoundField DataField="categoryname" HeaderText="categoryname"/>
                <asp:BoundField DataField="Productname" HeaderText="productname" />
                <asp:BoundField DataField="Productprice" HeaderText="productprice" />

                <asp:ImageField DataImageUrlField="Productimage" HeaderText="image" />
                
                <asp:BoundField DataField="Productdesc" HeaderText="productdesc" />
                </Columns>
                </asp:GridView>
            </td>
            <td>
                <asp:GridView ID="GridView2" runat="server">
                </asp:GridView>
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
                &nbsp;</td>
            <td>
                &nbsp;</td>
        </tr>
    </table>
    </form>
</body>
</html>
