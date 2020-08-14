using System;
using System.Collections.Generic;
using System.Linq;
using System.Web;
using System.Web.UI;
using System.Web.UI.WebControls;
using System.Data.SqlClient;
using System.Data;

public partial class login : System.Web.UI.Page
{
    SqlConnection con = new SqlConnection(@"Data Source=.\SQLEXPRESS;AttachDbFilename=D:\asp.net_prectice\WebSite10\App_Data\student.mdf;Integrated Security=True;User Instance=True");
    SqlCommand cmd = new SqlCommand();
    SqlDataAdapter adp = new SqlDataAdapter();
    DataSet ds = new DataSet();

    protected void Page_Load(object sender, EventArgs e)
    {
        if (con.State == ConnectionState.Broken || con.State == ConnectionState.Closed)
        {
            con.Open();
            Response.Write("connection");
        }
    }
   
    protected void Button1_Click(object sender, EventArgs e)
    {

        SqlDataAdapter adp = new SqlDataAdapter("select * from stud where email='"+TextBox1.Text+"' and password='"+TextBox2.Text+"'", con);
        DataSet ds = new DataSet();
        adp.Fill(ds);
        if (ds.Tables.Count > 0)
        {
            if (ds.Tables[0].Rows.Count > 0)
            {
                Session["new"] = TextBox1.Text;
                Response.Write("login");
                Response.Redirect("view.aspx");
            }
        }
    }
}