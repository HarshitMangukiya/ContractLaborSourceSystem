using System;
using System.Collections.Generic;
using System.Linq;
using System.Web;
using System.Web.UI;
using System.Web.UI.WebControls;
using System.Data.SqlClient;
using System.Data;
public partial class register : System.Web.UI.Page
{
    SqlConnection con = new SqlConnection(@"Data Source=.\SQLEXPRESS;AttachDbFilename=D:\asp.net_prectice\WebSite14\App_Data\online.mdf;Integrated Security=True;User Instance=True");
    SqlCommand cmd = new SqlCommand();
    SqlDataAdapter adp = new SqlDataAdapter();
    DataSet ds = new DataSet();
    protected void Page_Load(object sender, EventArgs e)
    {
        if (con.State == ConnectionState.Broken || con.State == ConnectionState.Closed)
        {
            con.Open();
            Response.Write("connction");
        }
    }
    protected void Button2_Click(object sender, EventArgs e)
    {
        SqlCommand cmd = new SqlCommand("StoredProcedure1", con);
        cmd.Parameters.AddWithValue("@var1", TextBox1.Text);
        cmd.Parameters.AddWithValue("@var2", TextBox2.Text);
        cmd.Parameters.AddWithValue("@var3", TextBox3.Text);
        cmd.Parameters.AddWithValue("@var4", DropDownList1.SelectedItem.ToString());
        cmd.Parameters.AddWithValue("@var5", DropDownList2.SelectedItem.ToString());
        cmd.Parameters.AddWithValue("@var6", TextBox4.Text);
        cmd.CommandType = CommandType.StoredProcedure;
        cmd.ExecuteNonQuery();
        Response.Write("insert record");
        //Response.Redirect("login.aspx");
    }
}