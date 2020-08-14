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
    SqlConnection con = new SqlConnection(@"Data Source=.\SQLEXPRESS;AttachDbFilename=D:\asp.net_prectice\WebSite11\App_Data\canteen.mdf;Integrated Security=True;User Instance=True");
    SqlCommand cmd = new SqlCommand();
    SqlDataAdapter adp = new SqlDataAdapter();
    DataSet ds = new DataSet();

    protected void Page_Load(object sender, EventArgs e)
    {
        if (con.State == ConnectionState.Closed || con.State == ConnectionState.Broken)
        {
            con.Open();
            Response.Write("connection");
        }
        
    }
    protected void Button1_Click1(object sender, EventArgs e)
    {
        //SqlCommand cmd = new SqlCommand("StoredProcedure1", con);
        //cmd.Parameters.AddWithValue("@var1", TextBox4.Text);
        //cmd.Parameters.AddWithValue("@var2", TextBox3.Text);
        //cmd.CommandType = CommandType.StoredProcedure;

        SqlDataAdapter adp = new SqlDataAdapter("select * from student where spassword='"+TextBox4.Text+"' and sname='"+TextBox3.Text+"'", con);
        DataSet ds = new DataSet();
        ds.Tables.Clear();
        adp.Fill(ds);
        if (ds.Tables.Count > 0)
        {
            if (ds.Tables[0].Rows.Count > 0)
            {
                Response.Write("login");
                Session["new"] = TextBox3.Text;
                Response.Redirect("view.aspx");
            }

        }

    }
}