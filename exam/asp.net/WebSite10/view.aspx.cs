using System;
using System.Collections.Generic;
using System.Linq;
using System.Web;
using System.Web.UI;
using System.Web.UI.WebControls;
using System.Data.SqlClient;
using System.Data;
public partial class view : System.Web.UI.Page
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
            displays();
        }
        if (Session["new"] != null)
        {
            Response.Write("login " + Session["new"]);
        }
        else
        {
            Response.Redirect("login.aspx");
        }
    }

    public void displays()
    {
        SqlDataAdapter adp = new SqlDataAdapter("select * from stud", con);
        DataSet ds = new DataSet();
        ds.Tables.Clear();
        adp.Fill(ds);
        GridView1.DataSource = ds;
        GridView1.DataBind();

    }
    protected void Button1_Click(object sender, EventArgs e)
    {
        string genderx=null;
        if(RadioButton1.Checked==true)
        {
            genderx="male";
        }
        if(RadioButton2.Checked==true)
        {
            genderx="female";
        }
        string streamx=null;
        if(RadioButton3.Checked==true)
        {
            streamx="science";
        }
        if(RadioButton4.Checked==true)
        {
            streamx="commerce";
        }

        string hobby = null;
        if (CheckBox1.Checked == true)
        {
            hobby =hobby+"dancing,";
        }

        if (CheckBox2.Checked == true)
        {
            hobby =hobby+"reading,";
        }
        if (CheckBox3.Checked == true)
        {
            hobby =hobby+"music,";
        }

        string age=DropDownList1.SelectedItem.ToString();

        string sem=DropDownList2.SelectedItem.ToString();

        SqlCommand cmd = new SqlCommand("insert into stud values('"+TextBox2.Text+"','"+genderx+"','"+age+"','"+hobby+"','"+sem+"','"+streamx+"','"+TextBox3.Text+"')", con);
        cmd.ExecuteNonQuery();
        Response.Write("insert record");
        displays();

        TextBox1.Text = string.Empty;
        TextBox2.Text = string.Empty;
        TextBox3.Text = string.Empty;
    }

    protected void Button4_Click(object sender, EventArgs e)
    {
        Session["new"] = null;
        Response.Redirect("login.aspx");
    }
    protected void GridView1_SelectedIndexChanged(object sender, EventArgs e)
    {
        TextBox1.Text = GridView1.SelectedRow.Cells[1].Text;
        TextBox2.Text = GridView1.SelectedRow.Cells[2].Text;
        TextBox3.Text = GridView1.SelectedRow.Cells[8].Text;
        string genderx = GridView1.SelectedRow.Cells[3].Text;
        if (genderx == "male")
        {
            RadioButton1.Checked = true;
            RadioButton2.Checked =false;

        }
        else if (genderx == "female")
        {
            RadioButton2.Checked = true;
            RadioButton1.Checked = false;

        }

        string streamx = GridView1.SelectedRow.Cells[7].Text;
        if (streamx == "science")
        {
            RadioButton3.Checked = true;
            RadioButton4.Checked = false;
        }
        else if (streamx == "commerce")
        {
            RadioButton4.Checked = true;
            RadioButton3.Checked = false;

        }

    }
    protected void Button5_Click(object sender, EventArgs e)
    {
        string genderx = null;
        if (RadioButton1.Checked == true)
        {
            genderx = "male";
        }
        if (RadioButton2.Checked == true)
        {
            genderx = "female";
        }
        string streamx = null;
        if (RadioButton3.Checked == true)
        {
            streamx = "science";
        }
        if (RadioButton4.Checked == true)
        {
            streamx = "commerce";
        }

        string hobby = null;
        if (CheckBox1.Checked == true)
        {
            hobby = hobby + "dancing,";
        }

        if (CheckBox2.Checked == true)
        {
            hobby = hobby + "reading,";
        }
        if (CheckBox3.Checked == true)
        {
            hobby = hobby + "music,";
        }

        string age = DropDownList1.SelectedItem.ToString();

        string sem = DropDownList2.SelectedItem.ToString();

        SqlCommand cmd = new SqlCommand("update stud set email='" + TextBox2.Text + "',gender='" + genderx + "',age='" + age + "',hobby='" + hobby + "',sem='" + sem + "',stream='" + streamx + "',password='" + TextBox3.Text + "' where id='" + TextBox1.Text + "'", con);
        cmd.ExecuteNonQuery();
        Response.Write("update record");
        displays();


        TextBox1.Text = string.Empty;
        TextBox2.Text = string.Empty;
        TextBox3.Text = string.Empty;

    }
    protected void Button6_Click(object sender, EventArgs e)
    {
        SqlCommand cmd = new SqlCommand("delete from stud where id='"+TextBox1.Text+"'", con);
        cmd.ExecuteNonQuery();
        Response.Write("delete  record");
        displays();

        TextBox1.Text = string.Empty;
        TextBox2.Text = string.Empty;
        TextBox3.Text = string.Empty;
    }
    protected void Button7_Click(object sender, EventArgs e)
    {
        Response.Redirect("display.aspx");
    }
}